<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $etudiants = Etudiant::all();
       
        return view('registrariat.index', [
                                            'etudiants'=>$etudiants,
                                            'username' =>(Auth::user() != null ? Auth::user()->name : '' )]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('registrariat.create', ['villes' => $villes]);
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
            'nom' => 'required|min:2|max:50',
            'adresse' => 'required|min:2|max:191',
            'phone' => 'required|min:2|max:20',
            'email' => 'required|email|mimes:.com',
            'date_naissance' => 'required|min:2|max:191',
        ]);

        $newEtudiant = Etudiant::create([
            'phone' => $request->phone,
            'email' => $request->email,
            'date_naissance' => $request->date_naissance,
            'ville_id' => $request->ville_id,
        ]);
        return redirect('etudiant/'.$newEtudiant->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {

        $ville = Ville::select('ville_nom')->WHERE('id', '=', $etudiant->ville_id)->get();

        return view ('registrariat.show', [
                                            'etudiant'=>$etudiant,
                                            'ville_nom'=>$ville[0]->ville_nom
                                            ]);
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
        return view('registrariat.edit', [
                                            'etudiant' => $etudiant,
                                            'villes' => $villes
                                        ]);
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

        $request->validate([
            'nom' => 'required|min:2|max:50',
            'adresse' => 'required|min:2|max:191',
            'phone' => 'required|min:2|max:20',
            'email' => 'required|email|mimes:.com',
            'date_naissance' => 'required|min:2|max:191',
        ]);

        $etudiant->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_naissance' => $request->date_naissance,
            'ville_id' => $request->ville_id
        ]);

        return redirect(route('etudiant.show', $etudiant->id));
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
        return redirect(route('etudiant'));
    }
}
