<?php

namespace App\Http\Controllers;

use App\Models\candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $candidat = new candidat();

        $candidat -> CIN =$request->input('CIN');
        $candidat -> Email =$request->input('Email');
        $candidat -> Mot_de_passe =$request->input('Mot_De_Passe');
		$candidat -> Photo_C =$request->input('Photo_C');
		$candidat -> Nom =$request->input('Nom');
		$candidat -> Prenom =$request->input('Prenom');
		$candidat -> Adresse =$request->input('Adresse');
		$candidat -> Tel_C =$request->input('Tel_C');

        $candidat->save();
        return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function show(candidat $candidat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function edit(candidat $candidat)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, candidat $candidat)
    {
      
    }

   
}
