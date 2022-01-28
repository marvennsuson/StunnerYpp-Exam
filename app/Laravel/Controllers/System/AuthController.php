<?php

namespace App\Laravel\Controllers\System;

use Illuminate\Http\Request;

use App\Laravel\Models\User;

use Auth;

class AuthController extends Controller
{
    protected $data;

    public function __construct()
    {

    }

    /**
     * @return Login View
     */
    public function login()
    {
        return view('system.auth.login');
    }

    /**
     * Login Attempt
     * 
     * @return Dashboard View
     */
    public function login_attempt(Request $request)
    {
 
        if(Auth::attempt(["email" => $request->username,"password" => $request->password]) || Auth::attempt(["username" => $request->username,"password" => $request->password])){
            session()->flash('notification-status','success');
            session()->flash('notification-message','Welcome back '.auth()->user()->name);

            return redirect()->route('system.dashboard.index');
        }
        else{
            session()->flash('username',$request->username);
            session()->flash('notification-status','error');
            session()->flash('notification-message','Wrong login credentials');

            return redirect()->route('system.login');
        }
    }

    /**
     * Logout
     * 
     * @return Login View
     */
    public function logout()
    {
        Auth::logout();

        session()->flash('notification-status','success');
        session()->flash('notification-message','Successfully logout');

        return redirect()->route('system.login');
    }


    /**
     * @return Login Page
     */
    public function redirect()
    {
        if(Auth::check())
        {
            return redirect()->route('system.dashboard.index');
        }
            return redirect()->route('system.login');
    }
}