<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    // login user
    public function store()
    {
        $validated = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (!Auth::attempt($validated)) {
            throw ValidationException::withMessages([
                'email' => 'Wrong credentials',
            ]);
        }

        request()->session()->regenerate();


        return redirect('/');

    }
    //logout logic
    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
