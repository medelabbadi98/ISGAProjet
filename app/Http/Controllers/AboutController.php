<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\candidat;
use App\Models\recruteur;

class AboutController extends Controller
{
    public function get(){

        $user = $this->show();
        //dd($user);

        return view('Candidatprofile.editabout',(['user'=>$user]));

    }

    
    public function edit(Request $Request){

        
        if(candidat()){
            $candidat = candidat::find(session()->get('Cin'));

            $candidat -> About = $Request->About;
            $candidat->update();
        }
        else{
            $recruteur = recruteur::find(session()->get('Cin'));

            $recruteur -> About = $Request->About;
            $recruteur->update();
        }

        return redirect()->back()->with("success","les changements a été effectuée avec succès!");
    }

    public function show(){

        if(candidat()){
            $about = DB::table('candidats')->where('IDuser',candidat()->id)->get()->first();
        }
        else{
            $about = DB::table('recruteurs')->where('IDuser',recruteur()->id)->get()->first();
        }
        
        return $about;
    }

}
