<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VilleController extends Controller
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
        $villes = Ville::withCount('Terrains')->get();
        return view("ville.index", compact("villes"));
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
            'ville' => 'required',
        ]);

        $data = [
            'nom' => $request->ville,
        ];

        if (!Ville::create($data)) {
            Session::flash('message', 'Error occured while Storing Ville');
            Session::flash('message_type', 'danger');
            return redirect()
                ->back();
        }

        Session::flash('message', 'Ville Was stored SuccessFuly');
        Session::flash('message_type', 'success');
        return redirect()->back();
    }

    public function edit(Ville $Ville)
    {
        return response()->json($Ville);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'ville' => 'required',
        ]);

        $data = [
            'nom' => $request->ville,
        ];

        if (!Ville::where('id', $request->id)
            ->update($data)) {
            Session::flash('message', 'Error occured while updating Ville');
            Session::flash('message_type', 'danger');
            return redirect()
                ->back();
        }

        Session::flash('message', 'Ville Was updated SuccessFuly');
        Session::flash('message_type', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ville $ville)
    {
        if (!Ville::find($ville->id)->delete()) {
            Session::flash('message', 'Error occured while Deleting Ville');
            Session::flash('message_type', 'danger');
            return redirect()
                ->back();
        }
        Session::flash('message', 'Ville Deleted SuccessFuly');
        Session::flash('message_type', 'success');
        return redirect()->back();
    }
}
