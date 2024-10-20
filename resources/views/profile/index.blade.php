@extends('layouts.main')

@section('container')

<script src="https://cdn.tailwindcss.com"></script>
<div class="w-[30rem]">
    <h1 class="mt-6 h1">{{ $user->name }}</h1>

    <!-- Display success message -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    
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
    <div class="my-3">
        <p>Password</p>
        <div id="password-display" class="bg-slate-200 rounded-md p-2 px-4 mt-2" style="display: none;">
            {{ $user->password }}
        </div>
        <button class="btn btn-outline-secondary mt-2" type="button" id="toggle-password-visibility">
            <i data-feather="eye"></i>
        </button>
    </div>

    <div class="inline-block">
        <a href="/profile/{{ $user->username }}/edit" class="btn btn-outline-primary mt-6 w-[9.5rem]">Edit Profile</a>
    </div>
    <div class="inline-block ml-5">
        <a href="/profile/changepassword" class="btn btn-outline-danger mt-6 w-[9.5rem]">Change Password</a>
    </div>
</div>
<script>
    feather.replace();

    document.getElementById('toggle-password-visibility').addEventListener('click', function() {
        const passwordDisplay = document.getElementById('password-display');
        const icon = this.querySelector('i');

        // Toggle visibility
        if (passwordDisplay.style.display === 'none') {
            passwordDisplay.style.display = 'block';
            icon.setAttribute('data-feather', 'eye-off');
        } else {
            passwordDisplay.style.display = 'none';
            icon.setAttribute('data-feather', 'eye');
        }
        feather.replace();
    });
</script>
@endsection