<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class VideoController extends Controller
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
            "videolinks" => "required",
        ]);

        if ($request->videolinks) {

            $links = collect(json_decode($request->videolinks));

            foreach ($links as $link) {
                if (!Str::contains($link->value, 'youtube')) {
                    Session::flash('message', "The link '" . $link->value . "' Provided is not A youtube Link");
                    Session::flash("VideoTab", "show active");
                    Session::flash('message_type', 'warning');
                    return redirect()
                        ->back();
                }
                if (!Video::create([
                    "VideoUrl" => explode("=", $link->value)[1],
                    "terrain_id" => $request->terrain_id,
                ])) {
                    Session::flash('message', 'Error occured while Adding Video Links Associated with the Terrain');
                    Session::flash("VideoTab", "show active");
                    Session::flash('message_type', 'danger');
                    return redirect()
                        ->back();
                }
            }
        }
        Session::flash('message', 'Video Links were Added to The terrain Collection');
        Session::flash("VideoTab", "show active");
        Session::flash('message_type', 'success');
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        try {

            Video::find($video->id)->delete();

            Session::flash('message', 'Video link Deleted SuccessFuly');
            Session::flash("VideoTab", "show active");
            Session::flash('message_type', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            Session::flash('message', 'Error Occured While deleting the Video Link');
            Session::flash("VideoTab", "show active");
            Session::flash('message_type', 'danger');
            return redirect()
                ->back();
        }
    }
}
