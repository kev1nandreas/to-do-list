<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profile/index', [
            'user' => auth()->user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('profile/edit', [
            'user' => auth()->user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'username' => 'required',
        ]);

        User::where('id', $user->id)->update($validated);

        return redirect('/profile')->with('success', 'Data successfully updated');
    }

    public function editPass(){
        return view('profile/changepassword', [
            'user' => auth()->user()
        ]);
    }

    public function changePassword(Request $request)
    {
        $user = auth()->user();
        $validated = $request->validate([
            'password' => 'required|min:8',
            'passwordconf' => 'required|min:8'
        ]);

        if ($validated['password'] !== $validated['passwordconf']) {
            return redirect('/profile/changepassword')->with('error', 'Password and confirmation password do not match');
        }

        if (Hash::check($validated['password'], $user->password)) {
            return redirect('/profile/changepassword')->with('error', 'New password cannot be the same as the current password');
        }
        $validated['password'] = bcrypt($validated['password']);

        User::where('id', $user->id)->update(['password' => $validated['password']]);
        
        return redirect('/profile')->with('success', 'Password successfully updated');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
