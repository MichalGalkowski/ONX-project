<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create() {

        return inertia('Auth/Register');
    }

    public function store(Request $request) {

        $user = User::create($request->validate([
            'name' => 'required',
            'surname' => 'required',
            'role' => 'required',
            'email'=> 'required|email|unique:users',
            'password'=>'required|min:6|confirmed',
        ]));
        Auth::login($user);

        return redirect()->route('entry.index');
    }
}
