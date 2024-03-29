<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use Illuminate\Http\Request;

class ModeleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modeles = Modele::paginate(6);
        return view('modele.index',['modeles'=>$modeles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modele.create');
    }
    public function serche(Request $request){
        $search = $request->search;
        $modeles = Modele::where(function($query) use ($search) {
        $query->where("libelle","like","%".$search."%")->orWhere("mh","like","%".$search."%");
        })->paginate(6);
        return view("modele.index",["modeles"=>$modeles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'mh' => 'required|integer|max:50',
        ]);
        Modele::create($request->all());
        return redirect()->route('modele.index')->with('success','Modele has been create successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $modele = Modele::find($id);
        return view('modele.edit',['modele'=>$modele]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $modeles = Modele::find($id);
        $modeles->update($request->all());
        return redirect()->route("modele.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $modeles = Modele::find($id);
        $modeles->delete();
        return redirect()->route('modele.index')->with('success','Modele has been delet successfully.');
    }
}
