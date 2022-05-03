<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\DB;
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
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
<<<<<<< HEAD
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            //
            return redirect()->intended('.pagecandidat')
                        ->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
=======
        $email =$request->email;          
        $password =$request->password;
        $users = DB::table('users')->select('id')->where('email','=',$email)->get();
        $candidat = DB::table('candidats')->select('*')->where('IDuser','=',((Array)$users[0])['id'])->get();
        $recruteur = DB::table('recruteurs')->select('*')->where('IDuser','=',((Array)$users[0])['id'])->get();
        //$credentials = $request->only('email', 'password');
        if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password], false, false))  {
            if($candidat->count()!=0){
               $request->session()->put('email', $email); 
               $request->session()->put('Cin', ((Array)$candidat[0])['CIN']);
               $request->session()->put('Nom', ((Array)$candidat[0])['Nom']);
               $request->session()->put('Prenom', ((Array)$candidat[0])['Prenom']);
               $request->session()->put('Tel_C', ((Array)$candidat[0])['Tel_C']);
               $request->session()->put('Adresse', ((Array)$candidat[0])['Adresse']);
               return redirect("pagecandidat");
            }
            else{
                $request->session()->put('recruteur', $recruteur);
                return redirect("pagecandidat");
            }
            //session::set('business_id', $business->id);
            //return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
            //return ((Array)$candidat[0])['Nom'];
        }
  
        return redirect("login");
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
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
<<<<<<< HEAD
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
=======
        $val=$request->select;

        $data = $request->all();
        $check = $this->create($data);
        $email =$request->email;  
        $users = DB::table('users')->select('id')->where('email','=',$email)->get();  
        $request->session()->put('id', ((Array)$users[0])['id']);
        $request->session()->put('Email',$email);
        $request->session()->put('Type',$val);
        
         
        return redirect("pagesettings");
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
<<<<<<< HEAD
        if(Auth::check()){
            return view('dashboard');
        }
  
=======
        
            return view('dashboard');
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
<<<<<<< HEAD
        'password' => $data['password']
=======
        'password' => Hash::make($data['password'])
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
      ]);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
<<<<<<< HEAD
=======
       
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
        Auth::logout();
  
        return Redirect('login');
    }
}