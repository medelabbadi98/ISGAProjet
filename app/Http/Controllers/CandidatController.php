<?php

namespace App\Http\Controllers;

use App\Models\candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidat = candidat::all();
       
        
        return view('Candidatprofile.pagecandidat'); 
    }
    public function setting()
    {
        $candidat = candidat::all();
        return view('Candidatprofile.pagesettings'); 
    }

    public function connection(Request $request){
        $candidat = DB::table('candidats')->where('email', $request->email)->first();
        return view('Home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('Candidat.SignUp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $candidat =new candidat();     
        $candidat -> CIN =$request->cin;     
        $candidat -> IDuser =session()->get('id');            
        $candidat -> Adresse =$request->adresse;
		$candidat -> Nom =$request->nom;
		$candidat -> Prenom =$request->prenom;
		$candidat -> Tel_C =$request->telephone;
        $candidat->save();
        $request->session()->put('Cin', $request->cin);
        $request->session()->put('Nom', $request->nom);
        $request->session()->put('Prenom', $request->prenom);
        $request->session()->put('Tel_C', $request->telephone);
        $request->session()->put('Adresse', $request->adresse);
        return view('Candidatprofile.pagecandidat'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function show(candidat $candidat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function edit(candidat $candidat)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, candidat $candidat)
    {
      
    }

   
}
