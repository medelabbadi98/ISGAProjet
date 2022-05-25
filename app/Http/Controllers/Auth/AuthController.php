<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\User;
use Hash;

  
class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('Auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('Auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $email =$request->email;          
        $password =$request->password;
        //  $users = DB::table('users')->select('id')->where('email','=',$email)->get();
        //  $candidat = DB::table('candidats')->select('*')->where('IDuser','=',((Array)$users[0])['id'])->get();
        //  $recruteur = DB::table('recruteurs')->select('*')->where('IDuser','=',((Array)$users[0])['id'])->get();

         

        if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password], false, false))  {
            if(candidat()){
                $candidat = DB::table('candidats')->where('IDuser','=',candidat()->id)->get()->first();
               session()->put('Cin',$candidat->CIN);
               return redirect("pagecandidat");
            }
            else{
                $recruteur = DB::table('recruteurs')->where('IDuser','=',recruteur()->id)->get()->first();
                session()->put('Cin',$recruteur->CIN);
                return redirect("pagecrecruteur");
            }
            // if($candidat->count()!=0){
            //    // $request->session()->put('CIN', ((Array)$candidat[0])['CIN']);
            //    $request->session()->put('Email', $email);
            //    $request->session()->put('Cin', ((Array)$candidat[0])['CIN']);
            //    $request->session()->put('Nom', ((Array)$candidat[0])['Nom']);
            //    $request->session()->put('Prenom', ((Array)$candidat[0])['Prenom']);
            //    $request->session()->put('Tel_C', ((Array)$candidat[0])['Tel_C']);
            //    $request->session()->put('Adresse', ((Array)$candidat[0])['Adresse']);
               
            // }
            // else{
            //     $request->session()->put('recruteur', $recruteur);
            // }
            //session::set('business_id', $business->id);
            // return redirect("dashboard");
            //return $request->session()->get('Cin') ;
            //return redirect("pagecandidat")->withSuccess('Oppes! You have entered invalid credentials');
        }
        else{
            return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
        }
  
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
            $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'type' =>$request['select']
          ]);

          auth()->login($user);

          $secteurs = DB::table('secteurs')->get();

          return view('Ajoutertype',(['secteurs'=>$secteurs]));

    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
           return redirect('dashboard');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout(Request $request) {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}