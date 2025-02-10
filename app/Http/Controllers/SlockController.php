<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Scripture;
use App\Models\Slock;
use Illuminate\Http\Request;

class SlockController extends Controller
{
    public function index()
    {
        return view('user.slocks');
    }

    public function bhav()
    {
        return view('user.bhav');
    }

    // admin
    public function list(Request $request)
    {
        $scriptures = Scripture::where('delete_status', 0)->where('active_status', 1)->orderBy('id')->get()->toArray();
        $divisions = Division::where('delete_status', 0)->where('active_status', 1)->orderBy('id')->get()->toArray();

        if ($request->isMethod('get')) {
            return view('slocks', ['data' => [], 'scriptures' => $scriptures, 'divisions' => $divisions]);
        }

        if ($request->isMethod('post')) {

            $list = Slock::where('lang_id', 1);
            if ($request->search_division_id) {
                $list->where('division_id', $request->search_division_id);
            } elseif ($request->search_scripture_id) {
                $divisions = Division::where('scripture_id', $request->search_scripture_id)->pluck('id')->toArray();
                $list->whereIn('division_id', $divisions);
            }

            $list = $list->orderBy('id', 'DESC')->get()->toArray();

            foreach ($list as $key => $singlerow) {
                $hindi = Slock::where('ref_id', $singlerow['id'])->where('lang_id', 2)->first();
                $english = Slock::where('ref_id', $singlerow['id'])->where('lang_id', 3)->first();
                $division = Division::find($singlerow['id']);
                $list[$key]['division'] = Scripture::find($division->id)->title . " - " . $division->title;
                $list[$key]['hindi'] = $hindi ? $hindi->toArray() : null;
                $list[$key]['english'] = $english ? $english->toArray() : null;
            }

            return view('slocks', ['data' => $list, 'scriptures' => $scriptures, 'divisions' => $divisions]);
        }
    }

    public function add(Request $request)
    {
        $request->validate([
            'division_id' => ['required', 'numeric'],
            'slock' => ['required'],
            'gujarati_short_description' => ['required'],
            'gujarati_description' => ['required'],
            'gujarati_audio' => ['file', 'max:2048'],
            'visible_at' => ['required', 'date'],
        ]);

        if ($request->has('gujarati_audio')) {
            $file_name = uniqid() . time() . '.' . $request->gujarati_audio->getClientOriginalExtension();
            $file_path = 'slocks/';

            HomeController::storeFileDirect($file_path, $request->file('gujarati_audio'), $file_name);
        }

        $ref = Slock::create([
            'lang_id' => 1,
            'division_id' => $request->division_id,
            'slock' => $request->slock,
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
                $file_path = 'slocks/';

                HomeController::storeFileDirect($file_path, $request->file('hindi_audio'), $hindi_file_name);
            }

            Slock::create([
                'lang_id' => 2,
                'division_id' => $request->division_id,
                'ref_id' => $ref->id,
                'slock' => $request->slock,
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
                $file_path = 'slocks/';

                HomeController::storeFileDirect($file_path, $request->file('english_audio'), $english_file_name);
            }

            Slock::create([
                'lang_id' => 3,
                'division_id' => $request->division_id,
                'ref_id' => $ref->id,
                'slock' => $request->slock,
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
            $editdata = Slock::where('id', $id)->first()->toArray();
            $editdata['scripture_id'] = Division::find($editdata['division_id'])->scripture_id;

            $hindi = Slock::where('ref_id', $editdata['id'])->where('lang_id', 2)->first();
            $english = Slock::where('ref_id', $editdata['id'])->where('lang_id', 3)->first();

            $editdata['hindi'] = $hindi ? $hindi->toArray() : null;
            $editdata['english'] = $english ? $english->toArray() : null;

            $scriptures = Scripture::where('delete_status', 0)->where('active_status', 1)->orderBy('id')->get()->toArray();
            $divisions = Division::where('scripture_id', $editdata['scripture_id'])->where('delete_status', 0)->where('active_status', 1)->orderBy('id')->get()->toArray();

            return view('slocks', ['data' => [], 'editdata' => $editdata, 'scriptures' => $scriptures, 'divisions' => $divisions]);
        }

        if ($request->isMethod('patch')) {
            $request->validate([
                'division_id' => ['required', 'numeric'],
                'slock' => ['required'],
                'gujarati_short_description' => ['required'],
                'gujarati_description' => ['required'],
                'gujarati_audio' => ['file', 'max:2048'],
                'visible_at' => ['required', 'date'],
            ]);

            $row = Slock::find($id);
            $row->division_id = $request->division_id;
            $row->slock = $request->slock;
            $row->short_description = $request->gujarati_short_description;
            $row->description = $request->gujarati_description;
            $row->summary = $request->gujarati_summary;

            if ($request->has('gujarati_audio')) {
                $file_name = uniqid() . time() . '.' . $request->gujarati_audio->getClientOriginalExtension();
                $file_path = 'slocks/';

                HomeController::deleteStoredFile($file_path . $row->audio);

                HomeController::storeFileDirect($file_path, $request->file('gujarati_audio'), $file_name);
                $row->audio = $file_name;
            }

            $row->visible_at = date('Y-m-d H:i:s', strtotime($request->visible_at . " 06:00:00"));
            $row->meta_slug = $request->meta_slug;
            $row->meta_title = $request->meta_title;
            $row->meta_desc = $request->meta_desc;
            $row->meta_keywords = $request->meta_keywords;
            $row->save();

            if ($request->hindi_description) {
                $row = Slock::where('lang_id', 2)->where('ref_id', $id)->first();
                $row->division_id = $request->division_id;
                $row->slock = $request->slock;
                $row->short_description = $request->hindi_short_description;
                $row->description = $request->hindi_description;
                $row->summary = $request->hindi_summary;

                if ($request->has('hindi_audio')) {
                    $file_name = uniqid() . time() . '.' . $request->hindi_audio->getClientOriginalExtension();
                    $file_path = 'slocks/';

                    HomeController::deleteStoredFile($file_path . $row->audio);

                    HomeController::storeFileDirect($file_path, $request->file('hindi_audio'), $file_name);
                    $row->audio = $file_name;
                }

                $row->visible_at = date('Y-m-d H:i:s', strtotime($request->visible_at . " 06:00:00"));
                $row->meta_slug = $request->meta_slug;
                $row->meta_title = $request->meta_title;
                $row->meta_desc = $request->meta_desc;
                $row->meta_keywords = $request->meta_keywords;
                $row->save();
            }

            if ($request->english_description) {
                $row = Slock::where('lang_id', 3)->where('ref_id', $id)->first();
                $row->division_id = $request->division_id;
                $row->slock = $request->slock;
                $row->short_description = $request->english_short_description;
                $row->description = $request->english_description;
                $row->summary = $request->english_summary;

                if ($request->has('english_audio')) {
                    $file_name = uniqid() . time() . '.' . $request->english_audio->getClientOriginalExtension();
                    $file_path = 'slocks/';

                    HomeController::deleteStoredFile($file_path . $row->audio);

                    HomeController::storeFileDirect($file_path, $request->file('english_audio'), $file_name);
                    $row->audio = $file_name;
                }

                $row->visible_at = date('Y-m-d H:i:s', strtotime($request->visible_at . " 06:00:00"));
                $row->meta_slug = $request->meta_slug;
                $row->meta_title = $request->meta_title;
                $row->meta_desc = $request->meta_desc;
                $row->meta_keywords = $request->meta_keywords;
                $row->save();
            }

            return redirect()->route('slocks')->with('success', 'Updated Successfully!');
        }
    }

    public function delete(Request $request, $id)
    {
        $slocks = Slock::where('ref_id', $id)->get()->toArray();
        foreach ($slocks as $singleSlock) {
            HomeController::deleteStoredFile('slocks/' . $singleSlock['audio']);
        }

        HomeController::deleteStoredFile('slocks/' . Slock::find($id)->audio);

        Slock::where('id', $id)->orWhere('ref_id', $id)->delete();
        return redirect()->route('slocks')->with('success', 'Deleted Successfully!');
    }

    // ajax call 
    public function changeStatus(Request $request)
    {
        $row = Slock::find($request->id);
        $row->active_status = $row->active_status == 1 ? 0 : 1;

        Slock::where('ref_id', $request->id)->update(['active_status' => $row->active_status]);

        if ($row->save()) {
            return response()->json('success', 200);
        } else {
            return response()->json('error', 200);
        }
    }
}
