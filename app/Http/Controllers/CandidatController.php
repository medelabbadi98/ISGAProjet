<?php

namespace App\Http\Controllers;

use App\Models\candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $diplome=DB::table('diplomes')->select('*')->where('Cin','=',session()->get('Cin'))->get();
        $experience=DB::table('experiences')->select('*')->where('Cin','=',session()->get('Cin'))->get();
        $competence=DB::table('competences')->select('*')->where('Cin','=',session()->get('Cin'))->get();
        $langue=DB::table('maitrisers')->leftJoin('langues', 'maitrisers.ID_Lg', '=', 'langues.Id_LG')->where('Cin','=',session()->get('Cin'))->get();
        $about=DB::table('candidats')->where('Cin',session()->get('Cin'))->value('About');
        
        return view('Candidatprofile.pagecandidat',compact('diplome','langue','competence','experience','about')); 
    }
    public function getsettings(){
        $candidat = $this->show();
        
           return view('Candidatprofile.pagesettings',(['candidat'=>$candidat]));
       
    }

    

    public function connection(Request $request){
        $candidat = DB::table('candidats')->where('email', $request->email)->first();
        return view('Home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('Candidat.SignUp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $candidat =new candidat();     
        $candidat -> CIN =$request->cin;     
        $candidat -> IDuser =session()->get('id');            
        $candidat -> Adresse =$request->adresse;
		$candidat -> Nom =$request->nom;
		$candidat -> Prenom =$request->prenom;
		$candidat -> Tel_C =$request->telephone;
        $candidat->save();
        $request->session()->put('Cin', $request->cin);
       
        $request->session()->put('Cin', $request->cin);
        $request->session()->put('Nom', $request->nom);
        $request->session()->put('Prenom', $request->prenom);
        $request->session()->put('Tel_C', $request->telephone);
        $request->session()->put('Adresse', $request->adresse);
        return view('Candidatprofile.pagecandidat'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $candidat = candidat::join('users','candidats.IDuser',"=",'users.id')->where('Cin',session()->get('Cin'))->first();
        //$candidat = candidat::find(session()->get('Cin'));
        return $candidat;
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

        $request->validate([
            'Photo_C' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    

       // $imageName = time().'.'.$request->Photo_C->extension();
        //$imageurl = "/assets/img" . "/" .$imageName;
        // $image = $request->file('Photo_C');
        // $image->move(public_path('/assets/img'),$image->getClientOriginalName());

        if ($request->has('Photo_C')) {
            $imageName = time().'.'.$request->Photo_C->extension();
            $imageurl = "/assets/img" . "/" .$imageName;
            $image->move(public_path('/assets/img'),$imageurl);
            $candidat-> Photo_C = $imageurl;
        }

      $candidat = candidat::find($request->cin);

      $candidat -> CIN =$request->cin; 
      $candidat -> Adresse =$request->adresse;
      $candidat -> Nom =$request->nom;
      $candidat -> Prenom =$request->prenom;
      $candidat -> Tel_C =$request->telephone;
      $candidat->update();
      return redirect()->back();
    }

     public function about(){
        $about=DB::table('candidats')->where('Cin',session()->get('Cin'))->value('About');
        return view('Candidatprofile.editabout',compact('about'));
     }

     public function editabout(Request $request){
        DB::table('candidats')->where('Cin',session()->get('Cin'))->update(['about' => $request->about]);
        return redirect("pagecandidat");
     }
   
}
