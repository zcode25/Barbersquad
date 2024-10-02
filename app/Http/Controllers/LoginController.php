<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login.index');
    }
    
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'     => 'required|email:dns',
            'password'  => 'required',
        ]);
 
        if (Auth::attempt(['email' =>  $credentials['email'], 'password' => $credentials['password'], 'type' => 'customer'])) {
            $request->session()->regenerate();
 
            return redirect()->intended('/booking');
        }

        if (Auth::attempt(['email' =>  $credentials['email'], 'password' => $credentials['password'], 'type' => 'admin'])) {
            $request->session()->regenerate();
 
            return redirect()->intended('/admin/booking');
        }
 
        return back()->with([
            'loginError' => 'Login field!',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
