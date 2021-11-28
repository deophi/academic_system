<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller{
    use AuthenticatesUsers {
        logout as performLogout;
    }

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){   
        $input = $request->all();
  
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'id';
        if(auth()->attempt(array($fieldType => $input['email'], 'password' => $input['password']))){
            return redirect()->route('akademik.index');
        }else{
            return redirect()->route('login')->with('error', 'Email-Address And Password Are Wrong.');
        } 
    }

    public function logout(Request $request){
        $this->performLogout($request);
        return redirect()->route('login');
    }
}
