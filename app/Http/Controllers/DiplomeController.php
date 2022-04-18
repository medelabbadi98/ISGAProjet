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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $diplome=new diplome();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\diplome  $diplome
     * @return \Illuminate\Http\Response
     */
    public function show(diplome $diplome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\diplome  $diplome
     * @return \Illuminate\Http\Response
     */
    public function edit(diplome $diplome)
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
    public function update(Request $request, diplome $diplome)
    {
        //
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
