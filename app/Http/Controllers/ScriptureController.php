<?php

namespace App\Http\Controllers;

use App\Models\Scripture;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

class ScriptureController extends Controller
{
    public function list()
    {
        $list = Scripture::where('delete_status', 0)->orderBy('id')->get()->toArray();
        return view('scriptures', ['data' => $list]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'image' => ['image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
            'visible_at' => ['required', 'date'],
        ]);

        if ($request->has('image')) {
            $image_name = uniqid() . time() . '.' . $request->image->getClientOriginalExtension();
            $image_path = public_path('uploads/scriptures/');

            Image::read($request->file('image'))->resize(1200, 800)->save($image_path . $image_name);
        }

        Scripture::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => isset($image_name) ? $image_name : null,
            'author' => $request->author,
            'publish_detail' => $request->publish_detail,
            'root_language' => $request->root_language,
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
            $list = Scripture::where('delete_status', 0)->orderBy('id')->get()->toArray();
            $editdata = Scripture::where('id', $id)->first()->toArray();
            return view('scriptures', ['data' => $list, 'editdata' => $editdata]);
        }

        if ($request->isMethod('patch')) {
            $request->validate([
                'title' => ['required'],
                'image' => ['image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
                'visible_at' => ['required', 'date'],
            ]);



            $row = Scripture::find($id);
            $row->title = $request->title;
            $row->description = $request->description;

            if ($request->has('image')) {
                $image_name = uniqid() . time() . '.' . $request->image->getClientOriginalExtension();
                $image_path = public_path('uploads/scriptures/');

                !empty($row->image) ? unlink($image_path . $row->image) : '';

                Image::read($request->file('image'))->resize(1200, 800)->save($image_path . $image_name);
                $row->image = $image_name;
            }

            $row->author = $request->author;
            $row->publish_detail = $request->publish_detail;
            $row->root_language = $request->root_language;
            $row->visible_at = date('Y-m-d H:i:s', strtotime($request->visible_at . " 06:00:00"));
            $row->meta_slug = $request->meta_slug;
            $row->meta_title = $request->meta_title;
            $row->meta_desc = $request->meta_desc;
            $row->meta_keywords = $request->meta_keywords;
            $row->save();

            return redirect()->route('scriptures')->with('success', 'Updated Successfully!');
        }
    }

    public function delete(Request $request, $id)
    {
        Scripture::where('id', $id)->update(['delete_status' => 1]);

        return redirect()->route('scriptures')->with('success', 'Deleted Successfully!');
    }

    // ajax call 
    public function changeStatus(Request $request)
    {
        $row = Scripture::find($request->id);
        $row->active_status = $row->active_status == 1 ? 0 : 1;

        if ($row->save()) {
            return response()->json('success', 200);
        } else {
            return response()->json('error', 200);
        }
    }
}
