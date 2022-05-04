<?php

namespace App\Http\Controllers;

use App\Models\diplome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function editdiplome($ID_Dip)
    {
        $typeDip=DB::table('diplomes')->where([['Cin',session()->get('Cin')],['ID_Dip',$ID_Dip]])->value('Type_Dip');
        $etablissment=DB::table('diplomes')->where([['Cin',session()->get('Cin')],['ID_Dip',$ID_Dip]])->value('Etablissement');
        $specialite=DB::table('diplomes')->where([['Cin',session()->get('Cin')],['ID_Dip',$ID_Dip]])->value('Specialites');
        $option=DB::table('diplomes')->where([['Cin',session()->get('Cin')],['ID_Dip',$ID_Dip]])->value('_Option');
        $anneeObtention=DB::table('diplomes')->where([['Cin',session()->get('Cin')],['ID_Dip',$ID_Dip]])->value('Annee_obtention');
        return view('Candidatprofile.editdiplome',compact('typeDip','etablissment','specialite','option','anneeObtention'));
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
        $diplome -> Cin=$request->session()->get('Cin');  
        $diplome -> Type_Dip=$request->Type_Dip;  
        $diplome -> Etablissement=$request->Etablissement;  
        $diplome -> Specialites=$request->Specialites;  
        $diplome -> _Option=$request->_Option;
        $diplome -> Annee_obtention=$request->Annee_obtention;    
        $diplome->save();
        return redirect("pagecandidat");
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
    public function update(Request $request, $ID_Dip)
    {
        $diplome  = diplome::find($ID_Dip);
        $diplome -> Type_Dip=$request->Type_Dip;  
        $diplome -> Etablissement=$request->Etablissement;  
        $diplome -> Specialites=$request->Specialites;  
        $diplome -> _Option=$request->_Option;
        $diplome -> Annee_obtention=$request->Annee_obtention;    
        $diplome->update();
        return redirect("pagecandidat");
    
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
