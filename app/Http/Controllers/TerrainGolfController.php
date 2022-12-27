<?php

namespace App\Http\Controllers;

use App\Models\TerrainGolf;
use Illuminate\Http\Request;

class TerrainGolfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("TerrainGolf.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("TerrainGolf.create");
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
     * @param  \App\Models\TerrainGolf  $terrainGolf
     * @return \Illuminate\Http\Response
     */
    public function show(TerrainGolf $terrainGolf)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TerrainGolf  $terrainGolf
     * @return \Illuminate\Http\Response
     */
    public function edit(TerrainGolf $terrainGolf)
    {
        return view("TerrainGolf.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TerrainGolf  $terrainGolf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TerrainGolf $terrainGolf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TerrainGolf  $terrainGolf
     * @return \Illuminate\Http\Response
     */
    public function destroy(TerrainGolf $terrainGolf)
    {
        //
    }
}
