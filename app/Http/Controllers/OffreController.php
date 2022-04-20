<?php

namespace App\Http\Controllers;

use App\Models\offre;
use Illuminate\Http\Request;

class OffreController extends Controller
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
    public function ajouteroffre()
    {
        return view('Recruteurprofile.ajouteroffre');
    }
    public function editoffre()
    {
        return view('Recruteurprofile.editoffre');
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
        $Offre = new offre();
        
        $Offre -> Id_CT=$request->Id_CT;  
        $Offre -> ID_Sec=$request->ID_Sec;  
        $Offre -> Id_rec=$request->Id_rec;  
        $Offre -> Intitule=$request->Intitule;  
        $Offre -> Date_Exp=$request->Date_Exp;
        $Offre -> Description_offre=$request->Description_offre;  
        $Offre -> Date_pub=$request->Date_pub;  
        $Offre->save();
        return redirect("Recruteurprofile.pagerecruteur")->withSuccess('Langue ajouter avec succes');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function show(offre $offre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function edit(offre $offre,Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $Offre = offre::find($id);
        $Offre -> Id_CT=$request->Id_CT;  
        $Offre -> ID_Sec=$request->ID_Sec;  
        $Offre -> Id_rec=$request->Id_rec;  
        $Offre -> Intitule=$request->Intitule;  
        $Offre -> Date_Exp=$request->Date_Exp;
        $Offre -> Description_offre=$request->Description_offre;  
        $Offre -> Date_pub=$request->Date_pub;  
        $Offre->update();
        return redirect()->back()->with('status','Offre modifier avec Success');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function destroy(offre $offre)
    {
        //
    }
}
