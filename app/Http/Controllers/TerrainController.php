<?php

namespace App\Http\Controllers;

use App\Models\Terrain;
use App\Models\Ville;
use Illuminate\Http\Request;
use \Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

use function PHPSTORM_META\map;

class TerrainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        return view("Terrain.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Terrain  $terrain
     * @return \Illuminate\Http\Response
     */
    public function show(Terrain $terrain)
    {

        return view("Terrain.show", compact("terrain"));
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
            "phones" => "required",
            "par" => "required",
            "lengh" => "required",
            "NumHoles" => "required",
            "ville_id" => "required",
            "description" => "required",
        ]);


        if (!Terrain::where('id', $request->id)
            ->update($request->only("id", "nom", "email", "region", "phones", "par", "lengh", "NumHoles", "ville_id", "description"))) {
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
        //
    }
}
