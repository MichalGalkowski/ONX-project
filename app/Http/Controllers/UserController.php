<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        return inertia('User/Index', [
            'dbUsers' => User::orderByDesc('created_at')
            ->paginate(10)
        ]);
    }

    public function show(User $user)
    {
        return inertia(
            'User/Show',
            [
                'dbUser' => $user
            ]
            );
    }

    public function edit(User $user)
    {
        return inertia(
            'User/Edit',
            [
                'dbUser' => $user
            ]
            );
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]));
        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
