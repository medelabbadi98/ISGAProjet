<?php

namespace App\Http\Controllers;

use App\Models\competence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function editcompetence($ID_Cmp)
    {
        $cmp=DB::table('competences')->where([['Cin',session()->get('Cin')],['ID_Cmp',$ID_Cmp]])->first();
        return view('Candidatprofile.editcompetence',compact('cmp'));
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
        
        $competences -> Cin=$request->session()->get('Cin');  
        $competences -> Libelle=$request->Libelle;
        $competences -> Description=$request->Desc_competence;
        $competences->save();
        return redirect("pagecandidat");
    
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
    public function update(Request $request, $ID_Cmp)
    {
        DB::table('competences')->where([['Cin',session()->get('Cin')],['ID_Cmp',$ID_Cmp]])->update(['Libelle' => $request->Libelle,'Description'=>$request->Description]);        
        return redirect("pagecandidat");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\competence  $competence
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        competence::find($ID)->delete();
        return redirect("pagecandidat");
    }
}
