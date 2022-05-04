<?php

namespace App\Http\Controllers;

use App\Models\maitriser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $maitriser -> Cin=$request->session()->get('Cin');  
        $maitriser -> ID_Lg=$request->langue;  
        $maitriser -> Niveau=$request->niveau;  
        $maitriser->save();
        return redirect("pagecandidat")->withSuccess('Langue ajouter avec succes');
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
    public function update(Request $request)
    {
        DB::table('maitrisers')->where([['Cin',session()->get('Cin')],['ID_Lg',$request->ID_Lg]])->update(['Niveau' => $request->niveau]);        
        return redirect("pagecandidat");
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
