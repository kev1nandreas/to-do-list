<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'unique:users,phone'],
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);
        return redirect('/login')->with('registerSuccess', 'Account successfully registered!');
    }

    public function index()
    {
        return view('register');
    }
}
