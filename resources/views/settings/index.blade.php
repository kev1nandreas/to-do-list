@extends('layouts.main')

@section('container')
<style>
    [data-bs-theme="dark"] .bg-custom-dark {
        color: black;
    }
</style>
<script src="https://cdn.tailwindcss.com"></script>
<div class="w-[30rem]">
    <h1 class="mt-6 h1">Settings</h1>

    <!-- Display success message -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    
    <div class="mt-3">
        <p>Reminder before day(s)</p>
        <div class="bg-slate-200 rounded-md p-2 px-4 mt-2  bg-custom-dark">
            {{ $user->notify_before }}
        </div>
    </div>
    <div class="mt-3">
        <p>Notify me?</p>
        <div class="bg-slate-200 rounded-md p-2 px-4 mt-2 bg-custom-dark">
            {{ $user->notify_me ? 'Yes' : 'No' }}
        </div>
    </div>

    <div class="inline-block">
        <a href="/settings/{{ $user->username }}/edit" class="btn btn-outline-primary mt-6 w-[9.5rem]">Edit Settings</a>
    </div>
</div>
<script>
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
        
    });
</script>
@endsection