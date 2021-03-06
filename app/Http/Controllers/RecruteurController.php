<?php

namespace App\Http\Controllers;

use App\Models\recruteur;
use Illuminate\Http\Request;
use App\Models\offre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Hash;

class RecruteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIdRecruteur(){
        $recruteur=DB::table('recruteurs')->where('Cin',session()->get('Cin'))->value('IDuser'); 
        return $recruteur;
    }

    public function index()
    {
        $secteurs = DB::table('secteurs')->get();
        
        $recruteur = $this->show();
        $id=RecruteurController::getIdRecruteur();
        $about=DB::table('recruteurs')->where('Cin',session()->get('Cin'))->value('About');
        
        $offre = offre::join('recruteurs','recruteurs.CIN','=','offres.CIN_rec')->join('secteurs','offres.ID_Sec','=','secteurs.Id_Sec')
        ->join('contrats','offres.Id_CT','=','contrats.Id_CT')->get();
        // $secteur = DB::table('secteurs')->where('Id_Sec',((Array)$offre[0])['ID_Sec'])->first();
        //$poste=DB::table('postulers')->where('Cin',session()->get('Cin'))->value('Id_');
        return view('Recruteurprofile.pagerecruteur',compact('recruteur','about','secteurs','offre')); 
        // return $offre;
           
    }

    
    public function getsettings(){

        $secteurs = DB::table('secteurs')->get();
        $user = $this->show();
        return view('Candidatprofile.pagesettings',(['user'=>$user,'secteurs'=>$secteurs]));
    }

    // public function getajouter(){
    //     return view('Candidatprofile.Ajoutertype');
    // }

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

        $request->validate([
            'Photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($request->has('Photo')) {
            $imageName = time().'.'.$request->Photo->extension();
            $imageurl = "/assets/img" . "/" .$imageName;
            $request->Photo->move(public_path('/assets/img'),$imageurl);
            $recruteur->photo_rec = $imageurl;
        }

        $recruteur->CIN=$request->cin;
        $recruteur->Nom=$request->nom;
        $recruteur->Prenom=$request->prenom;
        $recruteur->Adresse=$request->adresse;
        $recruteur->telephone_rec=$request->tel;
        $recruteur->IDuser=recruteur()->id;
        $user= DB::table('users')->where('id','=',$recruteur->IDuser)->get()->first();
        session()->put('Cin',$request->cin);
        session()->put('type',$user->type);

        $recruteur->save();

        return redirect('pagerecruteur');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\recruteur  $recruteur
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = recruteur::join('users','recruteurs.IDuser',"=",'users.id')->where('id',recruteur()->id)->get()->first();
        return $user;
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
    public function update(Request $request)
    {
        $request->validate([
            'Photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($request->has('Photo')) {
            $imageName = time().'.'.$request->Photo->extension();
            $imageurl = "/assets/img" . "/" .$imageName;
            $request->Photo->move(public_path('/assets/img'),$imageurl);
            $recruteur->photo_rec = $imageurl;
        }

        $recruteur = recruteur::find($request->cin);
        $user = recruteur();

        if (!(Hash::check($request->get('currentPass'), Auth::user()->password))) {
            dd(Auth::user()->password);

            return redirect()->back()->with("error","Mot de Passe Incorrect!!!!!");
        }

        

        if ($request->filled('newPass')){

            $request->validate([
                'newPass' => 'required|min:6|confirmed',
            ]);

            if(strcmp($request->get('currentPass'), $request->get('newPass')) == 0){
                return redirect()->back()->with("error","Le nouveau mot de passe ne peut pas ??tre le m??me que votre mot de passe actuel.");
            }
            else{
                $user->password = Hash::make($request->newPass);
            }
        }

        
        $recruteur->Nom=$request->nom;
        $recruteur->Prenom=$request->prenom;
        $recruteur->Adresse=$request->adresse;
        $recruteur->telephone_rec=$request->telephone;
        $recruteur->update();

        $user->name = $request->user;
        $user->email = $request->email;
        $user->update();

       
        return redirect()->back()->with("success","les changements a ??t?? effectu??e avec succ??s!");
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
    public function list(){
        $recruteurs = recruteur::paginate(8);
        return view("recruteursListe",compact('recruteurs'));
    }
    
    public function getrecruteurPage($CIN){
        $recruteurs = recruteur::join('users','recruteurs.IDuser','=','users.id')->get();
        foreach($recruteurs as $recruteur){
            if($recruteur->CIN == $CIN){                
                return view('Recruteurprofile.pagerecruteur',compact('recruteur','CIN')); 
            }
       }
    }

    function find(Request $request){
             
        $search_text = $request->input('query');
       
        $recruteurs = recruteur::join('users','recruteurs.IDuser','=','users.id')
                   ->where('Nom','LIKE','%'.$search_text.'%')
                   ->orWhere('Prenom','LIKE','%'.$search_text.'%')
                   ->orWhere('Adresse','LIKE','%'.$search_text.'%')                   
                   ->paginate(8);
                   return view("recruteursListe",compact('recruteurs'));
 
     }
}
