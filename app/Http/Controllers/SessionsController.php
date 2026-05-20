<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ]);

        if (!Auth::attempt($credentials)) {

            return back()
                ->withErrors(['email' => 'Invalid credentials.'])
                ->withInput()
            ;
           
        }

        $request->session()->regenerate();

        return redirect()->intended('/')->with('success', 'You are now logged in!');

        
    }

    public function destroy(Request $request)
    {
        
        Auth::logout();

        return redirect('/')->with('success', 'You have been logged out.');
    }
}
