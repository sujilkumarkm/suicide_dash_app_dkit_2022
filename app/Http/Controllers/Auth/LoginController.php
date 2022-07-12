<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Gcaptcha;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'userLogout']]);
    }

    
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('front.auth.login');
    }

    public function userLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function login(Request $request)
    {
        $resultJson = Gcaptcha::verifyCaptcha($request->get('recaptcha-response'));
        if ($resultJson->success != true) {        
            return response([
              'success' => false,
              'message' => 'Recaptcha Error'
          ], Response::HTTP_OK);
        }
        
        if ($resultJson->score >= 0.3) {

            $validator = Validator::make($request->all(), [
                'email' => 'required|email|max:50|exists:users',
                'password' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                if($request->ajax())
                {
                    return response()->json(array(
                        'success' => false,
                        'message' => 'Something went wrong!',
                        'errors' => $validator->getMessageBag()->toArray()
                    ), 401);
                }
                $this->throwValidationException($request, $validator);
            }

            $credentials = $request->only($this->username(), 'password');
            $authSuccess = Auth::attempt($credentials, $request->has('remember'));

            if($authSuccess) {
                $request->session()->regenerate();
                return response(['success' => true], Response::HTTP_OK);
            }

            return response([
                    'success' => false,
                    'message' => 'Auth failed (or some other message)'
                ], Response::HTTP_OK);
        }
    }

}
