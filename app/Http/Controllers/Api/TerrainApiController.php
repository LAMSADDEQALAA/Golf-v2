<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TerrainsResources;
use App\Models\Terrain;
use Illuminate\Http\Request;

class TerrainApiController extends Controller
{
    public function index()
    {
        return TerrainsResources::collection(Terrain::with("ville")->get());
    }
    public function show($id)
    {
        return new TerrainsResources(Terrain::with("ville")->where("id", $id)->first());
    }
}
