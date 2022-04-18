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
        $langue= new langue();
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
    public function edit(langue $langue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\langue  $langue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, langue $langue)
    {
        //
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
