<?php

namespace App\Http\Controllers;

use App\Models\Stagier;
use Illuminate\Http\Request;
use App\Models\Note;

class StagierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stagiers = Stagier::paginate(6);
        return view("stagier.index",["stagiers"=>$stagiers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("stagier.create");
    }
    public function search(Request $request){
        $search = $request->search;
        $stagiers = Stagier::where(function($query) use ($search) {
        $query->where("nom","like","%".$search."%")->orWhere("prenom","like","%".$search."%");
        })->paginate(6);
        return view("stagier.index",["stagiers"=>$stagiers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom"=>"required|max:50",
            "prenom"=>"required|max:50",
            "adresse"=>"required|max:50",
            "email"=>"required|max:100|email",
            "photo"=>"required|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]); 
        if ($photo = $request->file('photo')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $profileImage);
            $request['photo'] = "$profileImage";
        }
        Stagier::create($request->post());
        return redirect()->route("stagier.index")->with('success','Stagier has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stagier = Stagier::find($id);
        $notes = Note::where('stagiers_id', $id)->get();
        return view('stagier.show',["notes"=>$notes,"stagier"=>$stagier]);
        // $note = Note::findOrFail($id);

        // // Return the view with the data
        // return view('stagier.show', ['note'=>$note,'stagier'=>$stagier,'modele'=> $modele]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stagier = Stagier::find($id);
        return view('stagier.edit',['stagier'=>$stagier]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $stagier = Stagier::find($id);

        if (!$stagier) {
            return redirect()->route('stagier.index')->with('success', 'Stagier has been created successfully');
        }

        $stagier->nom = $request->nom;
        $stagier->prenom = $request->prenom;
        $stagier->adresse = $request->adresse;
        $stagier->ville = $request->ville;
        $stagier->email = $request->email;

        if ($request->hasFile('photo')) {
            $photoName = date('YmdHis') . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('image'), $photoName);
            $stagier->photo = $photoName;

        } else {
            unset($request['photo']);
        }

        $stagier->save();

        return redirect()->route('stagier.index')->with('success', 'Stagier updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stagiers = Stagier::find($id);
        $stagiers->delete();
        return redirect()->route("stagier.index")->with('success','Stagier has been Delete successfully.');
    }
}
