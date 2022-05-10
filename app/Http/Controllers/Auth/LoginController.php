<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
   // protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo()
    {
        if (auth()->user()->user_role == 0) {
            return '/company/dashboard';
        }
        if (auth()->user()->user_role == 3) {
            auth()->logout();
            return '/login';
        }
        if (auth()->user()->user_role == 2) {
            return '/user/dashboard';
        }
        if (auth()->user()->user_role == 1) {
            auth()->logout();
            return '/login';
        }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // login
    public function username()
    {
        $login = request()->input('login');
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL)? 'email' : (filter_var($login, FILTER_SANITIZE_NUMBER_INT)? 'phone': 'username');
        request()->merge([$fieldType => $login]);
        return $fieldType;
    }

}
