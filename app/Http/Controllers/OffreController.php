<?php

namespace App\Http\Controllers;

use App\Models\offre;
use Illuminate\Http\Request;

class OffreController extends Controller
{
   
    public function index()
    {
        $offres = $this->show();
        $secteurs = DB::table('secteurs')->get();
        return view("offre_d'emploi",compact('secteurs','offres'));
    }
    public function ajouterOffre()
    {
        $secteurs = DB::table('secteurs')->get();
        $contrats = DB::table('contrats')->get();
        //dd($secteurs[1]->Id_Sec);
        return view('Recruteurprofile.ajouteroffre',compact('secteurs','contrats'));
    }
    public function editOffre()
    {
        return view('Recruteurprofile.editoffre');
    }

    public function getOffrePage($id)
    {
        $offres = $this->show();
        foreach($offres as $offre){
             if($offre->Id_Offre == $id){
                  return view('offre-emploi-page',(['offre'=>$offre]));
             }
        }
        
    }

    public function postuler($id){

        $postuler = new postuler();
        
        $postuler->Cin = session()->get('Cin');
        $postuler->Id_offre = $id;
        $postuler->Date_Post = Carbon::now()->toDateTimeString(); 
        $postuler->save();
        return redirect()->back();


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
        return redirect("Recruteurprofile.pagerecruteur");
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function show(offre $offre)
    {
        $offre = offre::join('recruteurs','recruteurs.CIN','=','offres.CIN_rec')->join('secteurs','offres.ID_Sec','=','secteurs.Id_Sec')
        ->join('contrats','offres.Id_CT','=','contrats.Id_CT')->get();
        return $offre;
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
