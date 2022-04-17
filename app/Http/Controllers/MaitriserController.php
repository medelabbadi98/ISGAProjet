<?php

namespace App\Http\Controllers;

use App\Models\maitriser;
use Illuminate\Http\Request;

class MaitriserController extends Controller
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
        $maitriser=new maitriser();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\maitriser  $maitriser
     * @return \Illuminate\Http\Response
     */
    public function show(maitriser $maitriser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\maitriser  $maitriser
     * @return \Illuminate\Http\Response
     */
    public function edit(maitriser $maitriser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\maitriser  $maitriser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, maitriser $maitriser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\maitriser  $maitriser
     * @return \Illuminate\Http\Response
     */
    public function destroy(maitriser $maitriser)
    {
        //
    }
}
