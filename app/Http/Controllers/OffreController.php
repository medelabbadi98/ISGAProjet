<?php

namespace App\Http\Controllers;

use App\Models\offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RecruteurController;


class OffreController extends Controller
{
   
    public function index()
    {
        $offres = $this->show();
        $secteurs = DB::table('secteurs')->get();
        return view("offre_d'emploi",compact('secteurs','offres'));
    }
    public function ajouterOffre(Request $request)
    {   
            $secteurs = DB::table('secteurs')->get();
            $contrats = DB::table('contrats')->get();
            //dd($secteurs[1]->Id_Sec);
            $offre = null;
            return view('Recruteurprofile.ajouteroffre',compact('secteurs','contrats','offre'));
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
        $id= RecruteurController::getIdRecruteur();
        $Offre -> Id_CT=$request->contrat;  
        $Offre -> ID_Sec=$request->secteur;  
        $Offre -> CIN_rec=session()->get('Cin');  
        $Offre -> Intitule=$request->Intitule;  
        $Offre -> Date_Exp=$request->date_exp;
        $Offre -> Description_offre=$request->Description;  
        $Offre -> Date_pub=$request->date_pub;  
        $Offre->save();
        return redirect("pagerecruteur");
        // return gettype(RecruteurController::getIdRecruteur()) ;
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function show()
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
    public function edit($Nom_Sec)
    {
        $secteurs = DB::table('secteurs')->get();
        $contrats = DB::table('contrats')->get();
        $offre = DB::table('offres')->where('CIN_rec','=',session()->get('Cin'))->where('offres.Id_Sec','=',$Nom_Sec)->first();
        $selectContrat=DB::table('contrats')->where('Id_CT','=',$offre->Id_CT)->first();
        $selectSecteur=DB::table('secteurs')->where('Id_Sec','=',$offre->ID_Sec)->first();
        return view('Recruteurprofile.ajouteroffre',compact('secteurs','contrats','offre','selectContrat','selectSecteur'));

        //return $selectContrat;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $Offre = offre::find($request->Id_Offre);
        $Offre -> Id_CT=$request->contrat;  
        $Offre -> ID_Sec=$request->secteur;    
        $Offre -> Intitule=$request->Intitule;  
        $Offre -> Date_Exp=$request->date_exp;
        $Offre -> Description_offre=$request->Description;  
        $Offre -> Date_pub=$request->date_pub;  
        $Offre->update();
        return redirect("pagerecruteur");
    
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
