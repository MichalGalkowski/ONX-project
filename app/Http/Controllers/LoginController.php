<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create() {
        return inertia('Auth/Login');
    }

    public function store(Request $request) {

        if(!Auth::attempt($request->validate([
            'email'=> 'required|email',
            'password'=>'required|min:6',
        ]), true)) {
            throw ValidationException::withMessages([
                'email' => 'Nie udało się zalogować'
            ]);
        }
        $request->session()->regenerate();
        return redirect()->intended();
    }

    public function destroy(Request $request) {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
