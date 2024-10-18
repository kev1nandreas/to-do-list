<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect('/login');
    }

    public function index()
    {
        return view('register');
    }
}
