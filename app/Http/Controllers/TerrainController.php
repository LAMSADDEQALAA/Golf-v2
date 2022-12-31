<?php

namespace App\Http\Controllers;

use App\Models\Terrain;
use App\Models\Ville;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Session;

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
        //
    }
}
