<?php
  
namespace App\Http\Controllers\Front;
  
use Exception;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
  
class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        // dd(Route::current()->getName());
        return Socialite::driver('google')->redirect();
    }

        
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback(Request $request)
    {
        try {
      
            $user = Socialite::driver('google')->user();
            
            $finduser = User::where('google_id', $user->id)->first();
       
            if($finduser){
       
                Auth::login($finduser);
      
                return redirect()->intended('home');
       
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => Hash::make('Newuser@123')
                ]);
      
                Auth::login($newUser);
      
                return redirect()->intended('home');
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}