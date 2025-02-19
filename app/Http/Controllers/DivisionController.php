<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Scripture;
use Illuminate\Http\Request;
use Intervention\Image\Colors\Rgb\Channels\Red;
use Intervention\Image\Laravel\Facades\Image;


class DivisionController extends Controller
{
    public function index($id, $slug)
    {
        $data = Scripture::where('id', $id)->where('active_status', 1)->where('delete_status', 0)->where('visible_at', '<=', date('Y-m-d H:i:s'))->first();
        if ($data == null) {
            return abort(404);
        }
        
        $scripture = Scripture::find($id)->toArray();
        $divisions = Division::where('scripture_id', $id)->where('active_status', 1)->where('delete_status', 0)->where('visible_at', '<=', date('Y-m-d H:i:s'))->orderBy('visible_at')->get()->toArray();

        return view('user.divisions', ['scripture' => $scripture, 'divisions' => $divisions]);
    }

    // admin
    public function list(Request $request)
    {
        $scriptures = Scripture::where('delete_status', 0)->where('active_status', 1)->orderBy('id')->get()->toArray();

        if ($request->isMethod('get')) {
            return view('divisions', ['data' => [], 'scriptures' => $scriptures]);
        }

        if ($request->isMethod('post')) {

            $list = Division::join('scriptures', 'scriptures.id', 'divisions.scripture_id');

            if ($request->search_scripture_id) {
                $list->where('divisions.scripture_id', $request->search_scripture_id);
            }
            $list = $list->where('divisions.delete_status', 0)->orderBy('divisions.id', 'DESC')->get(['divisions.*', 'scriptures.title as scripture'])->toArray();

            return view('divisions', ['data' => $list, 'scriptures' => $scriptures]);
        }
    }

    public function add(Request $request)
    {
        $request->validate([
            'scripture_id' => ['required', 'numeric'],
            'title' => ['required'],
            'image' => ['image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
            'visible_at' => ['required', 'date'],
        ]);

        if ($request->has('image')) {
            $image_name = uniqid() . time() . '.' . $request->image->getClientOriginalExtension();
            $image_path = public_path('uploads/divisions/');

            Image::read($request->file('image'))->resize(1200, 800)->save($image_path . $image_name);

            $image_name = 'uploads/divisions/' . $image_name;
        }

        Division::create([
            'scripture_id' => $request->scripture_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => isset($image_name) ? $image_name : null,
            'visible_at' => date('Y-m-d H:i:s', strtotime($request->visible_at . " 06:00:00")),
            'meta_slug' => $request->meta_slug,
            'meta_title' => $request->meta_title,
            'meta_desc' => $request->meta_desc,
            'meta_keywords' => $request->meta_keywords,
        ]);

        return redirect()->back()->with('success', 'Added Successfully!');
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            $editdata = Division::where('id', $id)->first()->toArray();
            $scriptures = Scripture::where('delete_status', 0)->where('active_status', 1)->orderBy('id')->get()->toArray();

            return view('divisions', ['data' => [], 'editdata' => $editdata, 'scriptures' => $scriptures]);
        }

        if ($request->isMethod('patch')) {
            $request->validate([
                'scripture_id' => ['required', 'numeric'],
                'title' => ['required'],
                'image' => ['image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
                'visible_at' => ['required', 'date'],
            ]);

            $row = Division::find($id);
            $row->scripture_id = $request->scripture_id;
            $row->title = $request->title;
            $row->description = $request->description;

            if ($request->has('image')) {
                $image_name = uniqid() . time() . '.' . $request->image->getClientOriginalExtension();
                $image_path = public_path('uploads/divisions/');

                !empty($row->image) ? unlink($image_path . $row->image) : '';

                Image::read($request->file('image'))->resize(1200, 800)->save($image_path . $image_name);
                $row->image = 'uploads/divisions/' . $image_name;
            }

            $row->visible_at = date('Y-m-d H:i:s', strtotime($request->visible_at . " 06:00:00"));
            $row->meta_slug = $request->meta_slug;
            $row->meta_title = $request->meta_title;
            $row->meta_desc = $request->meta_desc;
            $row->meta_keywords = $request->meta_keywords;
            $row->save();

            return redirect()->route('divisions')->with('success', 'Updated Successfully!');
        }
    }

    public function delete(Request $request, $id)
    {
        Division::where('id', $id)->update(['delete_status' => 1]);

        return redirect()->route('divisions')->with('success', 'Deleted Successfully!');
    }

    // ajax call 
    public function changeStatus(Request $request)
    {
        $row = Division::find($request->id);
        $row->active_status = $row->active_status == 1 ? 0 : 1;

        if ($row->save()) {
            return response()->json('success', 200);
        } else {
            return response()->json('error', 200);
        }
    }

    public function ajaxList(Request $request)
    {

        $list = Division::where('scripture_id', $request->scripture_id)->where('delete_status', 0)->where('active_status', 1)->orderBy('id', 'DESC')->get()->toArray();
        return response()->json(['data' => $list], 200);
    }
}
