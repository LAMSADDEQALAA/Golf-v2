<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:super-admin|edit-terrain', ['only' => ['edit', 'destroy']]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "file" => "required",
        ]);

        $files = $request->file('file');
        if ($files) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $path = $file->storeAs('TerrainsImages', $name, 'public');
                if (!Image::create([
                    "ImgPath" => $path,
                    "ismain" => false,
                    "terrain_id" => $request->terrain_id,
                ])) {
                    Session::flash('message', 'Error occured while Adding Images Associated with the Terrain');
                    Session::flash("ImageTab", "show active");
                    Session::flash('message_type', 'danger');
                    return redirect()
                        ->back();
                }
            }
        }
        Session::flash('message', 'Images were Added to The terrain Collection');
        Session::flash("ImageTab", "show active");
        Session::flash('message_type', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        try {

            unlink(public_path("/storage/" . $image->ImgPath));
            Image::find($image->id)->delete();

            Session::flash('message', 'Image Deleted SuccessFuly');
            Session::flash("ImageTab", "show active");
            Session::flash('message_type', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            Session::flash('message', 'Error Occured While deleting the image');
            Session::flash("ImageTab", "show active");
            Session::flash('message_type', 'danger');
            return redirect()
                ->back();
        }
    }
    public function setmain(Image $image)
    {
        Image::where("ismain", 1)->update(["ismain" => false]);

        if (!$image->update(["ismain" => true])) {
            Session::flash('message', 'Error occured while Setting Image As the main image');
            Session::flash("ImageTab", "show active");
            Session::flash('message_type', 'danger');
            return redirect()
                ->back();
        }
        Session::flash('message', 'Image was set As main');
        Session::flash("ImageTab", "show active");
        Session::flash('message_type', 'success');
        return redirect()->back();
    }
}
