<?php

namespace App\Http\Controllers;

use App\Models\recruteur;
use Illuminate\Http\Request;

class RecruteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Recruteurprofile.pagerecruteur');
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
        $recruteur=new recruteur();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\recruteur  $recruteur
     * @return \Illuminate\Http\Response
     */
    public function show(recruteur $recruteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\recruteur  $recruteur
     * @return \Illuminate\Http\Response
     */
    public function edit(recruteur $recruteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\recruteur  $recruteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, recruteur $recruteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\recruteur  $recruteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(recruteur $recruteur)
    {
        //
    }
}
