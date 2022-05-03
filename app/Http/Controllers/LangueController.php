<?php

namespace App\Http\Controllers;

use App\Models\langue;
use Illuminate\Http\Request;

class LangueController extends Controller
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

    public function ajouterlangue()
    {
        return view('Candidatprofile.ajouterlangue');
    }

    public function editlangue()
    {
        return view('Candidatprofile.editlangue');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Langue::create([
            'Nom_Lg' => $data['Nom_Lg'],
          ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $langue=new langue();
        $langue -> Nom_Lg=$request->Nom_Lg;    
        $langue->save();
<<<<<<< HEAD

        return redirect("Candidatprofile.pagecandidat")->withSuccess('Langue ajouter avec succes');
=======
        return redirect("pagecandidat")->withSuccess('Langue ajouter avec succes');
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\langue  $langue
     * @return \Illuminate\Http\Response
     */
    public function show(langue $langue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\langue  $langue
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $langue = Langue::find($id);
        // return view('');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\langue  $langue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $langue = Langue::find($id);
        $langue->Nom_Lg=$request->Nom_Lg;   
        $langue->update();
        return redirect()->back()->with('status','Langue modifier avec Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\langue  $langue
     * @return \Illuminate\Http\Response
     */
    public function destroy(langue $langue)
    {
        //
    }
}
