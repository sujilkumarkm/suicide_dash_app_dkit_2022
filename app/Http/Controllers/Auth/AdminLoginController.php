<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Gcaptcha;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
      return view('admin.auth.login');
    }

    public function login(Request $request)
    {
      
      // $resultJson = Gcaptcha::verifyCaptcha($request->get('recaptcha-response'));
      
      // if ($resultJson->success != true) {        
        //   return response([
        //     'success' => false,
        //     'message' => 'Recaptcha Error'
        // ], Response::HTTP_OK);
      // }
      
      // if ($resultJson->score >= 0.3) {
        // Validate the form data
        $this->validate($request, [
          'email'   => 'required|email|exists:admins',
          'password' => 'required|min:6'
        ]);
        $this->validate($request, [
          'email'   => 'required|email|exists:admins',
          'password' => 'required|min:6'
        ]);

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
         
            $request->session()->regenerate();
            return redirect()->route('admin.home');
      
        //  }
        return response(['errors' => 
        ['password' => ['Invalid Username or password.'
        ]]], 401);
      }
    }
    
    
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
    
}
