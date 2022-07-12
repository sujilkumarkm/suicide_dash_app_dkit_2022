<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use App\Models\Gcaptcha;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRegisterController extends Controller
{
    use RegistersUsers;
    
    protected $redirectTo = RouteServiceProvider::ADMINHOME;

    public function __construct()
    {
      $this->middleware('guest:admin', ['except' => ['logout']]);
    }
 
    protected function validator(array $data)
    {
        $resultJson = Gcaptcha::verifyCaptcha($data['recaptcha-response']);

        if ($resultJson->success != true) {        
            return response([
              'success' => false,
              'message' => 'Recaptcha Error'
          ], Response::HTTP_OK);
        }
        
        if ($resultJson->score >= 0.3) {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }
        return false;
    }

    protected function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        Auth::guard('admin')->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : ['success' => true];
    }
}
