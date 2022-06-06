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
        if(session()->get('type')=='Candidat')
            return redirect('pagecandidat') ;
        else if(session()->get('type')=='Recruteur')
            return redirect('pagerecruteur');
        else
            return view('Auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        if(session()->get('type')=='Candidat')
            return redirect('pagecandidat') ;
        else if(session()->get('type')=='Recruteur')
            return redirect('pagerecruteur');
        else
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
        if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password], false, false))  {
            if(candidat()){
                $candidat = DB::table('candidats')->where('IDuser','=',candidat()->id)->get()->first();
                $user= DB::table('users')->where('id','=',candidat()->id)->get()->first();
               session()->put('Cin',$candidat->CIN);  
               session()->put('type',$user->type);
               session()->put('img',$candidat->Photo_C);
            return redirect('pagecandidat');
            }
            else{
                $recruteur = DB::table('recruteurs')->where('IDuser','=',recruteur()->id)->get()->first();
                $user= DB::table('users')->where('id','=',recruteur()->id)->get()->first();
                session()->put('Cin',$recruteur->CIN);
                session()->put('type',$user->type);
                session()->put('img',$recruteur->photo_rec);
                return redirect('pagerecruteur');
            }
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
  
        return Redirect('/');
    }
}