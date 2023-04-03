<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::orderBy('nom')->paginate(10);
        return view("etudiant.index", ["etudiants" => $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view("etudiant.create", ["villes" => $villes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation de tout les champs du formulaire
        $request->validate(
            [
                "nom" => "required|max:50",
                "adresse" => "required|max:100",
                "phone" => "required|integer",
                "email" => "required|email|unique:etudiants|max:50",
                "date_naissance" => "required|date",
                "ville_id" => "required",
            ],
        );

        $etudiant = new Etudiant;
        $etudiant->fill($request->all()); 
        $etudiant->save();

        return redirect(route("etudiant.index"))->withSuccess("Étudiant enregistré!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        $etudiant->join("villes", "ville_id", "villes.id")->get();
        return view("etudiant.show", ["etudiant" => $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all();
        return view("etudiant.edit", ["etudiant" => $etudiant], ["villes" => $villes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        // Validation de tout les champs du formulaire
        $request->validate(
            [
                "nom" => "required|max:50",
                "adresse" => "required|max:100",
                "phone" => "required|integer",
                'email' => 'required|email|max:50|unique:etudiants,email,' . $etudiant->id,
                "date_naissance" => "required|date",
                "ville_id" => "required",
            ],
        );

        $etudiant->fill($request->all());
        $etudiant->save();

        return redirect(route("etudiant.show", $etudiant->id))->withSuccess("Étudiant mise a jour!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect(route("etudiant.index"))->withSuccess("Étudiant effacé.");
    }
}
