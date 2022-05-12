<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RecruteurController;
use App\Http\Controllers\CandidatController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\models\User; 
use Hash;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('ajoutersettings');

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
    public function updatePassword(Request $request){
        if ($request->filled('newPass')){

            $request->validate([
                'newPass' => 'required|min:6|confirmed',
            ]);

            if(strcmp($request->get('currentPass'), $request->get('newPass')) == 0){
                return redirect()->back()->with("error","Le nouveau mot de passe ne peut pas être le même que votre mot de passe actuel.");
            }
            else{
                $user->password = Hash::make($request->newPass);
            }
        }
        return redirect();

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
