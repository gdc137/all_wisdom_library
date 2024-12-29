<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Scripture;
use App\Models\Slock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $scriptures = Scripture::count();
        $divisions = Division::count();
        $slocks = Slock::count();
        return view('dashboard', ['scripture_count' => $scriptures, 'division_count' => $divisions, 'slock_count' => $slocks]);
    }


    // file proccess

    public static function getFile($url)
    {
        if ($url) {
            return Storage::disk('public')->get($url);
        } else {
            return null;
        }
    }

    public static function getFileUrl($url)
    {
        if ($url) {
            return Storage::disk('public')->url($url);
        } else {
            return Storage::disk('public')->url('static/no-image.png');
        }
    }

    public static function storeFileDirect($file_path, $file, $new_name)
    {
        Storage::disk('public')->putFileAs($file_path, $file, $new_name);
    }

    public static function storeFile(Request $request, $file_name, $path, $new_filename, $height = null, $width = null)
    {
        $file_full_path = "";
        if ($request->has($file_name) && !empty($request->$file_name)) {

            $new_filename = $new_filename  . '.' . $request->$file_name->getClientOriginalExtension();

            $file_full_path = $path . $new_filename;
            if ($height || $width) {
                $height = $height ? $height : 320;
                $width = $width ? $width : 320;

                Image::make($request->$file_name)->resize($height, $width)->save(public_path('storage/temp/' . $new_filename));
                Storage::disk('public')->put($file_full_path, File::get('storage/temp/' . $new_filename));
                Storage::disk('public')->delete('temp/' . $new_filename);
            } else {
                Storage::disk('public')->putFileAs($path, $request->file($file_name), $new_filename);
            }
            return $file_full_path;
        }
    }

    public static function updateStoredFile(Request $request, $old_file, $file_name, $path, $new_filename, $height = null, $width = null)
    {
        $file_full_path = "";
        if ($request->has($file_name) && !empty($request->$file_name)) {
            $old_file ? Storage::disk('public')->delete($old_file) : "";

            $new_filename = $new_filename  . '.' . $request->$file_name->getClientOriginalExtension();

            $file_full_path = $path . $new_filename;
            if ($height || $width) {
                $height = $height ? $height : 320;
                $width = $width ? $width : 320;

                Image::make($request->$file_name)->resize($height, $width)->save(public_path('storage/temp/' . $new_filename));
                Storage::disk('public')->put($file_full_path, File::get('storage/temp/' . $new_filename));
                Storage::disk('public')->delete('temp/' . $new_filename);
            } else {
                Storage::disk('public')->putFileAs($path, $request->file($file_name), $new_filename);
            }
        }

        return $file_full_path;
    }

    public static function deleteStoredFile($file_path)
    {
        if ($file_path) {
            Storage::disk('public')->delete($file_path);
        }
    }

    public static function replaceStoredFile($file_path, $file)
    {
        Storage::disk('public')->delete($file_path);
        Storage::disk('public')->put($file_path, $file);
    }
}
