<?php

namespace App\Http\Controllers;

use App\Photo;
use Exception;
use Illuminate\Http\Request;

class AdminMediasController extends Controller
{
    //
    public function index()
    {
        $photos = Photo::all();
        return view('admin.media.index', compact(['photos']));
    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move('images', $name);
        Photo::create(['file' => $name]);
    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);

        if (file_exists(public_path() . $photo->file)) {
            unlink(public_path() . $photo->file);
        }
        $photo->delete();
    }

    public function deleteMedia(Request $request)
    {
        if (isset($request->delete_single)) {
            $this->destroy($request->photo);
            return back();
        }

        if (isset($request->delete_all) && !empty($request->checkBoxArray)) {
            $photos = Photo::findOrFail($request->checkBoxArray);
            foreach ($photos as $photo) {
                $photo->delete();
            }
            return back();
        } else {
            return back();
        }
    }
}
