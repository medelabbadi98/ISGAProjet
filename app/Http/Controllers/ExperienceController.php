<?php

namespace App\Http\Controllers;

use App\Models\experience;
use Illuminate\Http\Request;

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
    public function editexperience()
    {
        return view('Candidatprofile.editexperience');
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
<<<<<<< HEAD
       $experience -> Cin=$request->Cin;  
=======
       $experience -> Cin=$request->session()->get('Cin');  
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
       $experience -> Nom_Etp=$request->Nom_Etp;  
       $experience -> Intitule_Poste=$request->Intitule_Poste;  
       $experience -> Date_Debut=$request->Date_Debut;  
       $experience -> Date_Fin=$request->Date_Fin;
       $experience -> Description_Ex=$request->Description_Ex;    
       $experience->save();
<<<<<<< HEAD
       return redirect("pagecandidat")->withSuccess('Langue ajouter avec succes');
=======
       return redirect("pagecandidat");
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
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
    public function update(Request $request, $id)
    {
<<<<<<< HEAD
        $experience = experience::find($id);
        $experience -> Cin=$request->Cin;  
=======
        $experience = experience::find($id);    
        $experience -> Cin = $request->session->get('Cin');       
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
        $experience -> Nom_Etp=$request->Nom_Etp;  
        $experience -> Intitule_Poste=$request->Intitule_Poste;  
        $experience -> Date_Debut=$request->Date_Debut;  
        $experience -> Date_Fin=$request->Date_Fin;
        $experience -> Description_Ex=$request->Description_Ex;    
        $experience->update();
        return redirect()->back()->with('status',' experience modifier avec Success');
<<<<<<< HEAD
    
=======
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(experience $experience)
    {
        //
    }
}
