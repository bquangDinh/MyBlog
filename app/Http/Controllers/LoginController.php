<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $userData = array(
            'email' => $request->email,
            'password' => $request->password
        );

        if(Auth::attempt($userData)){
            return redirect()->to('/admin');
        }

        return redirect()->to('/login')->withErrors(array(
            'auth' => 'The user name or password is incorrect'
        ));
    }
}
