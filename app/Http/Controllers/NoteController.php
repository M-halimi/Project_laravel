<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::paginate(6);
        return view('notes.index',['notes'=>$notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("notes.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            "note"=>"required|max:20",
        ]);
        Note::create($request->post());
        return redirect()->route("notes.index")->with("success","");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function serchea(Request $request){
        $search = $request->search;
        $notes = Note::where(function($query) use ($search) {
        $query->where("note","like","%".$search."%");
        })->paginate(6);
        return view("notes.index",["notes"=>$notes]);
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
        $notes = Note::find($id);
        return view("notes.edit",["notes"=>$notes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $notes = Note::find($id);
       $notes->update($request->all());
    return redirect()->route("notes.index")->with("success","");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notes = Note::find($id);
        $notes->delete();
        return redirect()->route("notes.index")->with("success","gfdfsd");
    }
}
