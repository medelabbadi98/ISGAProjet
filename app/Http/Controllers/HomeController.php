<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\offre;
use App\Models\candidat;
use App\Models\postuler;
use App\Http\Controllers\RecruteurController;
use App\Http\Controllers\CandidatController;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->get('type')=='Candidat'){
            $candidat=candidat::join('secteurs','candidats.Id_sect','=','secteurs.Id_Sec')->where('CIN','=',session()->get('Cin'))->first();
            
            $offres = offre::join('recruteurs','recruteurs.CIN','=','offres.CIN_rec')->join('secteurs','offres.ID_Sec','=','secteurs.Id_Sec')
            ->join('contrats','offres.Id_CT','=','contrats.Id_CT')->where('secteurs.Nom_Sec','=',$candidat->Nom_Sec)->where('Date_pub','<=',date('Y-m-d'))->where('Date_Exp','>=',date('Y-m-d'))->take(3)->get();
            if(empty($offres->Nom_Sec)){
                $offres = offre::join('recruteurs','recruteurs.CIN','=','offres.CIN_rec')->join('secteurs','offres.ID_Sec','=','secteurs.Id_Sec')
            ->join('contrats','offres.Id_CT','=','contrats.Id_CT')->where('Date_pub','<=',date('Y-m-d'))->where('Date_Exp','>=',date('Y-m-d'))->take(3)->get();
            }
            return view('index',compact('offres'));

        }
        else if(session()->get('type')=='Recruteur'){

            $candidats = candidat::join('secteurs','candidats.Id_sect','=','secteurs.Id_Sec')->join('users','candidats.IDuser','=','users.id')->take(3)->get();
            
            return view('index',compact('candidats'));

        }
        else
            return view('index');

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
        $val = session()->get('Type');
        if($val == 0){
            $cand=new CandidatController();
            $cand::store($request);
            $diplome=DB::table('diplomes')->select('*')->where('Cin','=',session()->get('Cin'))->get();
            $experience=DB::table('experiences')->select('*')->where('Cin','=',session()->get('Cin'))->get();
            $competence=DB::table('competences')->select('*')->where('Cin','=',session()->get('Cin'))->get();
            $langue=DB::table('maitrisers')->leftJoin('langues', 'maitrisers.ID_Lg', '=', 'langues.Id_LG')->where('Cin','=',session()->get('Cin'))->get();
            $about=DB::table('candidats')->where('Cin',session()->get('Cin'))->value('About'); 
            return view('Candidatprofile.pagecandidat',compact('diplome','langue','competence','experience','about'));     
        }
        else{
            $rec=new RecruteurController();
            $rec::store($request);
           
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
