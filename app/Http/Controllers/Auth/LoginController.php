<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $data = $request->all();
        if(auth()->attempt([
            'email' => $data['email'],
            'password' => $data['password']
        ])){
            DB::table('users')->where('email', $data['email'])->update([
                'online' => 1, 
                'last_login_time' => now(), 
                'last_login_ip' => request()->getClientIp()
            ]);
             if(auth()->user()->user_type == "Employer"){
                return redirect()->route('employer.home');
            }elseif(auth()->user()->user_type == "Employee"){
                return redirect('/');
            }
        }else {
            return redirect()->back()->with('msg', 'The credentials you provided are invalid');
           
        }
    }

    public function logout(Request $request)
    {
        User::where('id', auth()->id())->update(['online' => 0]);
        Auth::logout();
        return redirect('/');
    }
}
