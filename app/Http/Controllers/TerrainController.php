<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Terrain;
use App\Models\Video;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use function PHPSTORM_META\map;

class TerrainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:super-admin|edit-terrain', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:super-admin|delete-terrain', ['only' => 'destroy']);
        $this->middleware('role_or_permission:super-admin|add-terrain', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:super-admin|view-terrain', ['only' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $terrains = Terrain::with("ville")->get();
        $villes = Ville::all();
        return view("Terrain.index", ["terrains" => $terrains, "villes" => $villes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view("Terrain.create", ["villes" => $villes]);
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
            "nom" => "required",
            "email" => "required|email|unique:terrains,email",
            "region" => "required",
            "phone1" => "required|unique:terrains,phone1",
            "phone2" => "unique:terrains",
            "par" => "required",
            "lengh" => "required",
            "NumHoles" => "required",
            "ville_id" => "required",
            "description" => "required",
            "images" => "required"
        ]);

        $terrain = Terrain::create($request->only("nom", "email", "region", "phone1", "phone2", "par", "lengh", "NumHoles", "description", "ville_id"));
        if (!$terrain) {
            Session::flash('message', 'Error occured while Adding the Terrain');
            Session::flash('message_type', 'danger');
            return redirect()
                ->back();
        }
        //store images and insert paths in db
        $files = $request->file('images');
        if ($files) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $path = $file->storeAs("TerrainsImages/$request->nom", $name, 'public');
                if (!Image::create([
                    "ImgPath" => $path,
                    "ismain" => false,
                    "terrain_id" => $terrain->id,
                ])) {
                    Session::flash('message', 'Error occured while Adding Pictured Associated with the Terrain');
                    Session::flash('message_type', 'danger');
                    return redirect()
                        ->back();
                }
            }
        }
        //insert video links
        if ($request->videolinks) {
            $links = collect(json_decode($request->videolinks));


            foreach ($links as $link) {
                if (!Str::contains($link->value, 'youtube')) {
                    Session::flash('message', "The link '" . $link->value . "' Provided is not A youtube Link");
                    Session::flash('message_type', 'warning');
                    return redirect()
                        ->back();
                }
                if (!Video::create([
                    "VideoUrl" => explode("&", explode("=", $link->value, 2)[1])[0],
                    "terrain_id" => $terrain->id,
                ])) {
                    Session::flash('message', 'Error occured while Adding Video Links Associated with the Terrain');
                    Session::flash('message_type', 'danger');
                    return redirect()
                        ->back();
                }
            }
        }

        Session::flash('message', 'Terrain Was Added SuccessFuly');
        Session::flash('message_type', 'success');
        return redirect("/terrain");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Terrain  $terrain
     * @return \Illuminate\Http\Response
     */
    public function show(Terrain $terrain)
    {

        return view("Terrain.show", ["terrain" => $terrain]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Terrain  $terrain
     * @return \Illuminate\Http\Response
     */
    public function edit(Terrain $terrain)
    {
        return response()->json($terrain);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Terrain  $terrain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([
            "id" => "required",
            "nom" => "required",
            "email" => "required|email",
            "region" => "required",
            "phone1" => "required",
            "par" => "required",
            "lengh" => "required",
            "NumHoles" => "required",
            "ville_id" => "required",
            "description" => "required",
        ]);


        if (!Terrain::where('id', $request->id)
            ->update($request->only("id", "nom", "email", "region", "phone1", "phone2", "par", "lengh", "NumHoles", "ville_id", "description"))) {
            Session::flash('message', 'Error occured while updating Terrain');
            Session::flash('message_type', 'danger');
            return redirect()
                ->back();
        }

        Session::flash('message', 'Terrain Was updated SuccessFuly');
        Session::flash('message_type', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Terrain  $terrain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Terrain $terrain)
    {
        try {
            Terrain::find($terrain->id)->delete();

            Session::flash('message', 'Terrain Deleted SuccessFuly');
            Session::flash('message_type', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            Session::flash('message', 'This record is related To other records Deletion is not possible');
            Session::flash('message_type', 'danger');
            return redirect()
                ->back();
        }
    }
}
