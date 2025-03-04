<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Scripture;
use App\Models\Shlok;
use Illuminate\Http\Request;

class ShlokController extends Controller
{
    public function index($id, $slug)
    {
        $data = Division::where('id', $id)->where('active_status', 1)->where('delete_status', 0)->where('visible_at', '<=', date('Y-m-d H:i:s'))->first();
        if ($data == null) {
            return abort(404);
        }

        $division = Division::find($id)->toArray();
        $shloks = Shlok::where('division_id', $id)->where('lang_id', 1)->where('active_status', 1)->where('visible_at', '<=', date('Y-m-d H:i:s'))->orderBy('visible_at')->get()->toArray();

        return view('user.shloks', ['division' => $division, 'shloks' => $shloks]);
    }

    public function bhav($id, $slug)
    {
        $data = Shlok::where('id', $id)->where('active_status', 1)->where('visible_at', '<=', date('Y-m-d H:i:s'))->first();
        if ($data == null) {
            return abort(404);
        }

        $shlok = Shlok::find($id);
        $ref_id = $shlok->ref_id ?? $shlok->id;

        $division = Division::find($shlok->division_id)->toArray();

        $details = Shlok::find($ref_id)->toArray();
        $hindi = Shlok::where('ref_id', $ref_id)->where('lang_id', 2)->first();
        $details['hindi'] = $hindi ? $hindi->toArray() : [];
        $english = Shlok::where('ref_id', $ref_id)->where('lang_id', 3)->first();
        $details['english'] = $english ? $english->toArray() : [];

        $extra = Shlok::where('id', '>', $id)->where('lang_id', 1)->where('active_status', 1)->where('visible_at', '<=', date('Y-m-d H:i:s'));

        $count = $extra->count();

        if ($count >= 2) {
            $shreni = $extra->limit(2)->get()->toArray();
        } elseif ($count == 1) {
            $shreni = $extra->get()->toArray();
            array_push($shreni, Shlok::where('id', '<', $id)->where('lang_id', 1)->where('active_status', 1)->where('visible_at', '<=', date('Y-m-d H:i:s'))->first()->toArray());
        }else {
            $shreni = Shlok::where('id', '<', $id)->where('lang_id', 1)->where('active_status', 1)->where('visible_at', '<=', date('Y-m-d H:i:s'))->orderBy('id', 'DESC')->limit(2)->get()->toArray();
        }

        return view('user.bhav', ['division' => $division, 'shlok' => $details, 'shreni' => $shreni]);
    }

    // admin
    public function list(Request $request)
    {
        $scriptures = Scripture::where('delete_status', 0)->where('active_status', 1)->orderBy('id')->get()->toArray();
        $divisions = Division::where('delete_status', 0)->where('active_status', 1)->orderBy('id')->get()->toArray();

        if ($request->isMethod('get')) {
            return view('shloks', ['data' => [], 'scriptures' => $scriptures, 'divisions' => $divisions]);
        }

        if ($request->isMethod('post')) {

            $list = Shlok::where('lang_id', 1);
            if ($request->search_division_id) {
                $list->where('division_id', $request->search_division_id);
            } elseif ($request->search_scripture_id) {
                $divisions = Division::where('scripture_id', $request->search_scripture_id)->pluck('id')->toArray();
                $list->whereIn('division_id', $divisions);
            }

            $list = $list->orderBy('id', 'DESC')->get()->toArray();

            foreach ($list as $key => $singlerow) {
                $hindi = Shlok::where('ref_id', $singlerow['id'])->where('lang_id', 2)->first();
                $english = Shlok::where('ref_id', $singlerow['id'])->where('lang_id', 3)->first();
                $division = Division::find($singlerow['division_id']);
                $list[$key]['division'] = Scripture::find($division->scripture_id)->title . " - " . $division->title;
                $list[$key]['hindi'] = $hindi ? $hindi->toArray() : null;
                $list[$key]['english'] = $english ? $english->toArray() : null;
            }

            return view('shloks', ['data' => $list, 'scriptures' => $scriptures, 'divisions' => $divisions]);
        }
    }

    public function add(Request $request)
    {
        $request->validate([
            'division_id' => ['required', 'numeric'],
            'shlok' => ['required'],
            'gujarati_short_description' => ['required'],
            'gujarati_description' => ['required'],
            'gujarati_audio' => ['file', 'max:20480'],
            'visible_at' => ['required', 'date'],
        ]);

        if ($request->has('gujarati_audio')) {
            $file_name = uniqid() . time() . '.' . $request->gujarati_audio->getClientOriginalExtension();
            $file_path = 'shloks/';

            HomeController::storeFileDirect($file_path, $request->file('gujarati_audio'), $file_name);

            $file_name = 'storage/shloks/' . $file_name;
        }

        $ref = Shlok::create([
            'lang_id' => 1,
            'division_id' => $request->division_id,
            'shlok' => $request->shlok,
            'short_description' => $request->gujarati_short_description,
            'description' => $request->gujarati_description,
            'summary' => $request->gujarati_summary,
            'audio' => isset($file_name) ? $file_name : null,
            'visible_at' => date('Y-m-d H:i:s', strtotime($request->visible_at . " 06:00:00")),
            'meta_slug' => $request->meta_slug,
            'meta_title' => $request->meta_title,
            'meta_desc' => $request->meta_desc,
            'meta_keywords' => $request->meta_keywords,
        ]);

        if ($request->hindi_description) {
            if ($request->has('hindi_audio')) {
                $hindi_file_name = uniqid() . time() . '.' . $request->hindi_audio->getClientOriginalExtension();
                $file_path = 'shloks/';

                HomeController::storeFileDirect($file_path, $request->file('hindi_audio'), $hindi_file_name);

                $hindi_file_name = 'storage/shloks/' . $hindi_file_name;
            }

            Shlok::create([
                'lang_id' => 2,
                'division_id' => $request->division_id,
                'ref_id' => $ref->id,
                'shlok' => $request->shlok,
                'short_description' => $request->hindi_short_description,
                'description' => $request->hindi_description,
                'summary' => $request->hindi_summary,
                'audio' => isset($hindi_file_name) ? $hindi_file_name : null,
                'visible_at' => date('Y-m-d H:i:s', strtotime($request->visible_at . " 06:00:00")),
                'meta_slug' => $request->meta_slug,
                'meta_title' => $request->meta_title,
                'meta_desc' => $request->meta_desc,
                'meta_keywords' => $request->meta_keywords,
            ]);
        }

        if ($request->english_description) {
            if ($request->has('english_audio')) {
                $english_file_name = uniqid() . time() . '.' . $request->english_audio->getClientOriginalExtension();
                $file_path = 'shloks/';

                HomeController::storeFileDirect($file_path, $request->file('english_audio'), $english_file_name);

                $english_file_name = 'storage/shloks/' . $english_file_name;
            }

            Shlok::create([
                'lang_id' => 3,
                'division_id' => $request->division_id,
                'ref_id' => $ref->id,
                'shlok' => $request->shlok,
                'short_description' => $request->english_short_description,
                'description' => $request->english_description,
                'summary' => $request->english_summary,
                'audio' => isset($english_file_name) ? $english_file_name : null,
                'visible_at' => date('Y-m-d H:i:s', strtotime($request->visible_at . " 06:00:00")),
                'meta_slug' => $request->meta_slug,
                'meta_title' => $request->meta_title,
                'meta_desc' => $request->meta_desc,
                'meta_keywords' => $request->meta_keywords,
            ]);
        }

        return redirect()->back()->with('success', 'Added Successfully!');
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            $editdata = Shlok::where('id', $id)->first()->toArray();
            $editdata['scripture_id'] = Division::find($editdata['division_id'])->scripture_id;

            $hindi = Shlok::where('ref_id', $editdata['id'])->where('lang_id', 2)->first();
            $english = Shlok::where('ref_id', $editdata['id'])->where('lang_id', 3)->first();

            $editdata['hindi'] = $hindi ? $hindi->toArray() : null;
            $editdata['english'] = $english ? $english->toArray() : null;

            $scriptures = Scripture::where('delete_status', 0)->where('active_status', 1)->orderBy('id')->get()->toArray();
            $divisions = Division::where('scripture_id', $editdata['scripture_id'])->where('delete_status', 0)->where('active_status', 1)->orderBy('id')->get()->toArray();

            return view('shloks', ['data' => [], 'editdata' => $editdata, 'scriptures' => $scriptures, 'divisions' => $divisions]);
        }

        if ($request->isMethod('patch')) {
            $request->validate([
                'division_id' => ['required', 'numeric'],
                'shlok' => ['required'],
                'gujarati_short_description' => ['required'],
                'gujarati_description' => ['required'],
                'gujarati_audio' => ['file', 'max:20480'],
                'visible_at' => ['required', 'date'],
            ]);

            $row = Shlok::find($id);
            $row->division_id = $request->division_id;
            $row->shlok = $request->shlok;
            $row->short_description = $request->gujarati_short_description;
            $row->description = $request->gujarati_description;
            $row->summary = $request->gujarati_summary;

            if ($request->has('gujarati_audio')) {
                $file_name = uniqid() . time() . '.' . $request->gujarati_audio->getClientOriginalExtension();
                $file_path = 'shloks/';

                HomeController::deleteStoredFile($file_path . $row->audio);

                HomeController::storeFileDirect($file_path, $request->file('gujarati_audio'), $file_name);
                $row->audio = 'storage/shloks/' . $file_name;
            }

            $row->visible_at = date('Y-m-d H:i:s', strtotime($request->visible_at . " 06:00:00"));
            $row->meta_slug = $request->meta_slug;
            $row->meta_title = $request->meta_title;
            $row->meta_desc = $request->meta_desc;
            $row->meta_keywords = $request->meta_keywords;
            $row->save();

            if ($request->hindi_description) {
                $row = Shlok::where('lang_id', 2)->where('ref_id', $id)->first();
                $row->division_id = $request->division_id;
                $row->shlok = $request->shlok;
                $row->short_description = $request->hindi_short_description;
                $row->description = $request->hindi_description;
                $row->summary = $request->hindi_summary;

                if ($request->has('hindi_audio')) {
                    $file_name = uniqid() . time() . '.' . $request->hindi_audio->getClientOriginalExtension();
                    $file_path = 'shloks/';

                    HomeController::deleteStoredFile($file_path . $row->audio);

                    HomeController::storeFileDirect($file_path, $request->file('hindi_audio'), $file_name);
                    $row->audio = 'storage/shloks/' . $file_name;
                }

                $row->visible_at = date('Y-m-d H:i:s', strtotime($request->visible_at . " 06:00:00"));
                $row->meta_slug = $request->meta_slug;
                $row->meta_title = $request->meta_title;
                $row->meta_desc = $request->meta_desc;
                $row->meta_keywords = $request->meta_keywords;
                $row->save();
            }

            if ($request->english_description) {
                $row = Shlok::where('lang_id', 3)->where('ref_id', $id)->first();
                $row->division_id = $request->division_id;
                $row->shlok = $request->shlok;
                $row->short_description = $request->english_short_description;
                $row->description = $request->english_description;
                $row->summary = $request->english_summary;

                if ($request->has('english_audio')) {
                    $file_name = uniqid() . time() . '.' . $request->english_audio->getClientOriginalExtension();
                    $file_path = 'shloks/';

                    HomeController::deleteStoredFile($file_path . $row->audio);

                    HomeController::storeFileDirect($file_path, $request->file('english_audio'), $file_name);
                    $row->audio = 'storage/shloks/' . $file_name;
                }

                $row->visible_at = date('Y-m-d H:i:s', strtotime($request->visible_at . " 06:00:00"));
                $row->meta_slug = $request->meta_slug;
                $row->meta_title = $request->meta_title;
                $row->meta_desc = $request->meta_desc;
                $row->meta_keywords = $request->meta_keywords;
                $row->save();
            }

            return redirect()->route('shloks')->with('success', 'Updated Successfully!');
        }
    }

    public function delete(Request $request, $id)
    {
        $shloks = Shlok::where('ref_id', $id)->get()->toArray();
        foreach ($shloks as $singleShlok) {
            HomeController::deleteStoredFile(str_replace('storage/', '', $singleShlok['audio']));
        }

        HomeController::deleteStoredFile(str_replace('storage/', '', Shlok::find($id)->audio));

        Shlok::where('id', $id)->orWhere('ref_id', $id)->delete();
        return redirect()->route('shloks')->with('success', 'Deleted Successfully!');
    }

    // ajax call 
    public function changeStatus(Request $request)
    {
        $row = Shlok::find($request->id);
        $row->active_status = $row->active_status == 1 ? 0 : 1;

        Shlok::where('ref_id', $request->id)->update(['active_status' => $row->active_status]);

        if ($row->save()) {
            return response()->json('success', 200);
        } else {
            return response()->json('error', 200);
        }
    }
}
