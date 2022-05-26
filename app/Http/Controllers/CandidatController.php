<?php

namespace App\Http\Controllers;

use App\Models\candidat;
use App\Models\diplome;
use App\models\User;
use App\Models\experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Auth;
use Hash;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $AboutController;

     public function  __construct(AboutController $AboutController){
        $this->AboutController = $AboutController;
     }
   
    public function index()
    {
        $secteurs = DB::table('secteurs')->get();
        
        $candidat = $this->show();
        $diplome=DB::table('diplomes')->select('*')->where('Cin','=',session()->get('Cin'))->get();
        $experience=DB::table('experiences')->select('*')->where('Cin','=',session()->get('Cin'))->get();
        $competence=DB::table('competences')->select('*')->where('Cin','=',session()->get('Cin'))->get();
        $langue=DB::table('maitrisers')->leftJoin('langues', 'maitrisers.ID_Lg', '=', 'langues.Id_LG')->where('Cin','=',session()->get('Cin'))->get();
        $about=DB::table('candidats')->where('Cin',session()->get('Cin'))->value('About');
        return view('Candidatprofile.pagecandidat',compact('candidat','diplome','experience','langue','about','secteurs','competence')); 
           
    }

    public function getsettings(){
        $secteurs = DB::table('secteurs')->get();
        $user = $this->show();
        //dd(auth()->user());
        return view('Candidatprofile.pagesettings',(['user'=>$user,'secteurs'=>$secteurs]));
    }

    // public function getajouter(){
    //     return view('Candidatprofile.Ajoutertype');
    // }


    public function connection(Request $request){
        $candidat = DB::table('candidats')->where('email', $request->email)->first();
        return view('Home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $candidat =new candidat();   

        $request->validate([
            'Photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($request->has('Photo')) {
            $imageName = time().'.'.$request->Photo->extension();
            $imageurl = "/assets/img" . "/" .$imageName;
            $request->Photo->move(public_path('/assets/img'),$imageurl);
            $candidat-> Photo_C = $imageurl;
        }
         
        $candidat -> CIN =$request->cin;          
        $candidat -> Adresse =$request->adresse;
		$candidat -> Nom =$request->nom;
		$candidat -> Prenom =$request->prenom;
		$candidat -> Tel_C =$request->tel;
        $candidat -> IDuser = auth()->user()->id;
        $candidat -> Id_sect = $request->secteur;
        $user= DB::table('users')->where('id','=',$candidat -> IDuser)->get()->first();
        session()->put('Cin',$request->cin);
        session()->put('type',$user->type);
     
        $candidat->save();
        return redirect('pagecandidat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $user = candidat::join('users','candidats.IDuser',"=",'users.id')->where('id',auth()->user()->id)->get()->first();
        $user = candidat::join('users','candidats.IDuser',"=",'users.id')->join('secteurs','secteurs.Id_Sec','=','candidats.Id_sect')->where('id',candidat()->id)->get()->first();
        return $user;
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
    public function update(Request $request)
    {

        $candidat = candidat::find($request->cin);
        $user = candidat();
        
        $request->validate([
            'Photo_C' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'currentPass' => 'required',          
        ]);
    
        if ($request->has('Photo_C')) {
            $imageName = time().'.'.$request->Photo_C->extension();
            $imageurl = "/assets/img" . "/" .$imageName;
            $request->Photo_C->move(public_path('/assets/img'),$imageurl);        
            $candidat-> Photo_C = $imageurl;
        }

        
        if (!(Hash::check($request->get('currentPass'), Auth::user()->password))) {
            return redirect()->back()->with("error","Mot de Passe Incorrect!!!!!");
        }

        

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
      
        

      
      $candidat -> Adresse = $request->adresse;
      $candidat -> Nom =$request->nom;
      $candidat -> Prenom =$request->prenom;
      $candidat -> Tel_C =$request->telephone;
      $candidat -> Id_sect = $request->secteur;
      $user->name = $request->user;
      $user->email = $request->email;
      $user->update();
      $candidat->update();

      return redirect()->back()->with("success","les changements a été effectuée avec succès!");
    }


    public function list(){
        $candidats = candidat::join('secteurs','candidats.Id_sect','=','secteurs.Id_Sec')->paginate(8);
        $secteurs = DB::table('secteurs')->get();
        return view("candidatsListe",compact('secteurs','candidats'));
    }

    public function getcandidatPage($CIN){
        $candidats = candidat::join('secteurs','candidats.Id_sect','=','secteurs.Id_Sec')->join('users','candidats.IDuser','=','users.id')->get();
        foreach($candidats as $candidat){
            if($candidat->CIN == $CIN){
                
                $diplome=DB::table('diplomes')->select('*')->where('Cin','=',$CIN)->get();
                $experience=DB::table('experiences')->select('*')->where('Cin','=',$CIN)->get();
                $competence=DB::table('competences')->select('*')->where('Cin','=',$CIN)->get();
                $langue=DB::table('maitrisers')->leftJoin('langues', 'maitrisers.ID_Lg', '=', 'langues.Id_LG')->where('Cin','=',$CIN)->get();
                $about=DB::table('candidats')->where('Cin',$CIN)->value('About');
                return view('Candidatprofile.pagecandidat',compact('candidat','diplome','experience','langue','about','competence','CIN')); 
            }
       }
    }

    function findM(Request $request){
        
       $secteurs = DB::table('secteurs')->get();
       $search_text = $request->input('query');
      
       $candidats = candidat::join('secteurs','candidats.Id_sect','=','secteurs.Id_Sec')
                  ->where('Nom','LIKE','%'.$search_text.'%')
                  ->orWhere('Prenom','LIKE','%'.$search_text.'%')
                  ->orWhere('Adresse','LIKE','%'.$search_text.'%')
                  ->orWhere('Nom_Sec','LIKE','%'.$search_text.'%')
                  ->paginate(8);
                  return view("candidatsListe",compact('secteurs','candidats'));

    }

    function findS(Request $request){
       $secteurs = DB::table('secteurs')->get();
       $search_text = $request->Sec;             
        $candidats = candidat::join('secteurs','candidats.Id_sect','=','secteurs.Id_Sec')
                    ->where('Nom_Sec','LIKE',''.$search_text.'')                  
                    ->paginate(8);
        return view("candidatsListe",compact('secteurs','candidats'));

    }
   
}
