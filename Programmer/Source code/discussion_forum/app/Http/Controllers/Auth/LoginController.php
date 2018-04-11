<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/forum';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        $user = \Auth::user();
        $type = $user->user_role;
        
        if($type == 1){
            return redirect()->intended('/forum/dashboard');
        }elseif($type == 2){
            return redirect()->intended('/forum/dashboard');
        }elseif($type== 3){
            return redirect()->intended('/forum');
        }elseif($type== 4){
            return redirect()->intended('/forum');
        }elseif($type== 5){
            return redirect()->intended('/forum');
        }else{
        return redirect()->intended($this->redirectPath());
        }
        
    }
}
