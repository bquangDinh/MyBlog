<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Auth;

class LoginController extends Controller
{   
    use ThrottlesLogins;

    public function username(){
        return 'email';
    }

    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required', 
            'password' => 'required|min:6|max:18'
        ]);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $userData = array(
            'email' => $request->email,
            'password' => $request->password
        );

        if(Auth::attempt($userData)){
            $this->clearLoginAttempts($request);
            return redirect()->to('/admin');
        }

        $this->incrementLoginAttempts($request);

        return redirect()->to('/login')->withErrors(array(
            'auth' => 'The user name or password is incorrect'
        ));
    }

    protected function sendLockoutResponse(Request $request)
    {
        return redirect()->to('/');
    }
}
