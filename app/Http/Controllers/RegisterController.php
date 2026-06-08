<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        // validate
        $validated = request()->validate(
            [
                'name' => ['required', 'string', 'min:5'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => [
                    'required',
                    Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                        ->uncompromised(),
                    'confirmed',
                ],
                'role' => ['required', 'in:3,4'],
            ]
        );
        $roleId = $validated['role'];
        unset($validated['role']);
        // create user
        $user = User::create($validated);
        $user->roles()->attach($roleId);
        // assign role

        // log in
        Auth::login($user);
        // redirect
        return redirect('/');
    }
}
