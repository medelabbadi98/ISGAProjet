<?php

namespace App\Http\Controllers;

use App\Models\experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

   
    public function ajouterexperience()
    {
        return view('Candidatprofile.ajouterexperience');
    }
    public function editexperience($ID_Exp)
    {
        $ID=$ID_Exp;
        $Intpost=DB::table('experiences')->where([['Cin',session()->get('Cin')],['ID_Exp',$ID_Exp]])->value('Intitule_Poste');
        $nomEtp=DB::table('experiences')->where([['Cin',session()->get('Cin')],['ID_Exp',$ID_Exp]])->value('Nom_Etp');
        $dateDeb=DB::table('experiences')->where([['Cin',session()->get('Cin')],['ID_Exp',$ID_Exp]])->value('Date_Debut');
        $dateFin=DB::table('experiences')->where([['Cin',session()->get('Cin')],['ID_Exp',$ID_Exp]])->value('Date_Fin');
        $Desc=DB::table('experiences')->where([['Cin',session()->get('Cin')],['ID_Exp',$ID_Exp]])->value('Description_Ex');

        return view('Candidatprofile.editexperience',compact('Intpost','nomEtp','dateDeb','dateFin','Desc','ID'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $experience = new experience();
       $experience -> Cin=$request->session()->get('Cin');  
       $experience -> Nom_Etp=$request->Nom_Etp;  
       $experience -> Intitule_Poste=$request->Intitule_Poste;  
       $experience -> Date_Debut=$request->Date_Debut;  
       $experience -> Date_Fin=$request->Date_Fin;
       $experience -> Description_Ex=$request->Description_Ex;    
       $experience->save();
       return redirect("pagecandidat");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(experience $experience,Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$ID)
    {
        $experience = experience::find($ID);          
        $experience -> Nom_Etp=$request->Nom_Etp;  
        $experience -> Intitule_Poste=$request->Intitule_Poste;  
        $experience -> Date_Debut=$request->Date_Debut;  
        $experience -> Date_Fin=$request->Date_Fin;
        $experience -> Description_Ex=$request->Description_Ex;    
        $experience->update();
        return redirect("pagecandidat");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        experience::find($ID)->delete();
        return redirect("pagecandidat");
    }
}
