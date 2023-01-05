<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
        $this->middleware('guest')->except('logout');
    }
    public function customerlogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::where('email', $request->email)->where('is_admin', 0)->first())

        {
            if (auth()->attempt(array('email' =>$request->email ,'password' =>$request->password ))) {
                    return redirect()->route('customer.home');
                }
            else {
                return redirect()->back()->with('error','Invalid email or password');
            }
        }

    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->attempt(array('email' =>$request->email ,'password' =>$request->password ))) {
            if (auth()->user()->is_admin==1) {
                return redirect()->route('admin.home');
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back()->with('error','Invalid email or password');
        }
    }
    public function adminLogin()
    {
        return view('auth.admin_login');
    }
}
