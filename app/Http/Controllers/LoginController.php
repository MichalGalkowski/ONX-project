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
            'email'=> 'required|string|email',
            'password'=>'required|string|min:6',
        ]), true)) {
            throw ValidationException::withMessages([
                'email' => 'Nie udało się zalogować'
            ]);
        }
        $request->session()->regenerate();
        return redirect()->intended();
    }

    public function destroy() {

    }
}
