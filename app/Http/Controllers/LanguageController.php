<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function list()
    {
        $list = Language::where('delete_status', 0)->orderBy('id')->get()->toArray();
        return view('languages', ['data' => $list]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        Language::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Added Successfully!');
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            $list = Language::where('delete_status', 0)->orderBy('id')->get()->toArray();
            $editdata = Language::where('id', $id)->first()->toArray();
            return view('languages', ['data' => $list, 'editdata' => $editdata]);
        }

        if ($request->isMethod('patch')) {
            $request->validate([
                'name' => ['required'],
            ]);

            $row = Language::find($id);
            $row->name = $request->name;
            $row->save();

            return redirect()->route('languages')->with('success', 'Updated Successfully!');
        }
    }

    public function delete(Request $request, $id)
    {
        Language::where('id', $id)->update(['delete_status' => 1]);

        return redirect()->route('languages')->with('success', 'Deleted Successfully!');
    }

    // ajax call 
    public function changeStatus(Request $request)
    {
        $row = Language::find($request->id);
        $row->active_status = $row->active_status == 1 ? 0 : 1;

        if ($row->save()) {
            return response()->json('success', 200);
        } else {
            return response()->json('error', 200);
        }
    }
}
