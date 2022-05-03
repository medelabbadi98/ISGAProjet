<?php

namespace App\Http\Controllers;

use App\Models\diplome;
use Illuminate\Http\Request;

class DiplomeController extends Controller
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
        return view('Candidatprofile.ajouterdiplome');
    }
    public function editdiplome()
    {
        return view('Candidatprofile.editdiplome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $diplome=new diplome();
<<<<<<< HEAD
        $diplome -> Cin=$request->Cin;  
=======
        $diplome -> Cin=$request->session()->get('Cin');  
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
        $diplome -> Type_Dip=$request->Type_Dip;  
        $diplome -> Etablissement=$request->Etablissement;  
        $diplome -> Specialites=$request->Specialites;  
        $diplome -> _Option=$request->_Option;
        $diplome -> Annee_obtention=$request->Annee_obtention;    
        $diplome->save();
<<<<<<< HEAD
         return redirect("pagecandidat");
        
    
=======
        return redirect("pagecandidat");
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\diplome  $diplome
     * @return \Illuminate\Http\Response
     */
    public function show(diplome $diplome)
    {
        $diplome = DB::table('diplomes')->where('Cin', '=',session()->get('Cin'));
        return $diplome;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\diplome  $diplome
     * @return \Illuminate\Http\Response
     */
    public function edit(diplome $diplome,Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\diplome  $diplome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $diplome  = diplome::find($id);
<<<<<<< HEAD
        $diplome -> Cin=$request->Cin;  
=======
        $diplome -> Cin=$request->session->get('Cin');  
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
        $diplome -> Type_Dip=$request->Type_Dip;  
        $diplome -> Etablissement=$request->Etablissement;  
        $diplome -> Specialites=$request->Specialites;  
        $diplome -> _Option=$request->_Option;
        $diplome -> Annee_obtention=$request->Annee_obtention;    
        $diplome->update();
        return redirect()->back()->with('status','Diplome modifier avec Success');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\diplome  $diplome
     * @return \Illuminate\Http\Response
     */
    public function destroy(diplome $diplome)
    {
        //
    }
}
