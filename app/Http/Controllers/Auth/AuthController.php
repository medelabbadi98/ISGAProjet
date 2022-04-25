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
        $users = DB::table('users')->select('id')->where('email','=',$email)->get();
        $candidat = DB::table('candidats')->select('*')->where('IDuser','=',((Array)$users[0])['id'])->get();
        $recruteur = DB::table('recruteurs')->select('*')->where('IDuser','=',((Array)$users[0])['id'])->get();
       
        //$credentials = $request->only('email', 'password');
        if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password], false, false))  {
            if($candidat->count()!=0){
                $request->session()->put('CIN', ((Array)$candidat[0])['CIN']);
            }
            else{
                $request->session()->put('ID_REC', ((Array)$recruteur[0])['ID_REC']);
            }
            //session::set('business_id', $business->id);
            //return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
            //return session::get('cin');
            return $recruteur->count();
        }
  
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
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
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        
            return view('dashboard');
        
  
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
        'password' => Hash::make($data['password'])
      ]);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}