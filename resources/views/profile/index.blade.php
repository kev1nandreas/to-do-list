@extends('layouts.main')

@section('container')
<div class="w-[30rem]">
    <h1 class="mt-6 h1">{{ $user->name }}</h1>

    <div class="mt-3">
        <p>Phone Number</p>
        <div class="bg-slate-200 rounded-md p-2 px-4 mt-2">
            {{ $user->phone }}
        </div>
    </div>
    <div class="mt-3">
        <p>Email</p>
        <div class="bg-slate-200 rounded-md p-2 px-4 mt-2">
            {{ $user->email }}
        </div>
    </div>
    <div class="my-3">
        <p>Username</p>
        <div class="bg-slate-200 rounded-md p-2 px-4 mt-2">
            {{ $user->username }}
        </div>
    </div>

    <div class="inline-block">
        <a href="/profile/{{ $user->username }}/edit" class="btn btn-outline-primary mt-6 w-[9.5rem]">Edit Profile</a>
    </div>
    <div class="inline-block ml-5">
        <a href="/changePassword" class="btn btn-outline-danger mt-6 w-[9.5rem]">Change Password</a>
    </div>
</div>
    
@endsection