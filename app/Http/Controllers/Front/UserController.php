<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
        public function authenticate(Request $request)
        {
                $request->validate([
                'email' => 'required',
                'password' => 'required',
                ]);
        
                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {
                return redirect()->intended('profile')
                                ->withSuccess('Signed in');
                }
        
                return redirect("login")->withSuccess('Login details are not valid');
        }
        public function home()
        {
                if(Auth::check()){
                return view('profile.home');
                }
        
                return redirect("login")->withSuccess('You are not allowed to access');
        }
}
