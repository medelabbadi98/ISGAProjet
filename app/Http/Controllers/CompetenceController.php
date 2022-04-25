<?php

namespace App\Http\Controllers;

use App\Models\competence;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Candidatprofile.ajoutercompetence');
    }
    public function editcompetence()
    {
        return view('Candidatprofile.editcompetence');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $competences = new Competence();
        
        $competences -> Cin=$request->Cin;  
        $competences -> Libelle=$request->Libelle;
        $competences -> Description=$request->Desc_competence;
        $competences->save();
        return redirect("pagecandidat")->withSuccess('Langue ajouter avec succes');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\competence  $competence
     * @return \Illuminate\Http\Response
     */
    public function show(competence $competence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\competence  $competence
     * @return \Illuminate\Http\Response
     */
    public function edit(competence $competence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\competence  $competence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, competence $competence)
    {
        $competence = competence::find($id);
        $competences -> Cin=$request->Cin;  
        $competences -> Description=$request->Description;
        $competences->update();
        return redirect()->back()->with('status','Competence modifier avec Success');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\competence  $competence
     * @return \Illuminate\Http\Response
     */
    public function destroy(competence $competence)
    {
        //
    }
}
