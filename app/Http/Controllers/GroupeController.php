<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groupes = Groupe::paginate(6);
        return view("groupe.index",["groupes"=>$groupes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("groupe.create");
    }
    public function searche(Request $request){
        $search = $request->search;
        $groupes = Groupe::where(function($query) use ($search) {
        $query->where("groupe","like","%".$search."%");
        })->paginate(6);
        return view("groupe.index",["groupes"=>$groupes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "groupe"=>"required|max:50",
        ]);
        Groupe::create($request->all());
        return redirect()->route('groupe.index')->with('success','Groupe has been created successfully');
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
        $groupe = Groupe::find($id);
        return view('groupe.edit',['groupe'=>$groupe]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "groupe"=>"required|string|max:100",
        ]);
        $groupe = Groupe::find($id);
        $groupe->update($request->all());
        return redirect()->route("groupe.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $groupes = Groupe::find($id);
        $groupes->delete();
        return redirect()->route("groupe.index")->with('success','Stagier has been Delete successfully.');
    }
}
