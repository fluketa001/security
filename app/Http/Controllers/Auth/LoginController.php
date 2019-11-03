<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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
    protected $redirectTo = '/user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected $username = 'username';

    public function username()
    {
        return 'username';
    }
    use AuthenticatesUsers;


    protected function authenticated(Request $request, $user)
    {
        if ( $user->status == 'admin' ) {// do your margic here
            return redirect()->route('user.index');
        }else{
            return redirect('/home');
        }
    }

    public function login(Request $request)
    {
        $user = User::where([
            'username' => $request->username,
            'password' => $request->password
        ])->first();

        if($user)
        {
            Auth::login($user);
            return redirect()->route('user.index');
        }else{
            return redirect()->route('login')->with('Error','Username หรือ Password ไม่ถูกต้อง!');
        }
    }
}
