@extends('layouts.main')

@section('container')

<h1 class="h1">Change Password for {{ $user->name }}</h1>

<!-- Display error message -->
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<form method="POST" action="/profile/newpassword">
    @csrf

    <div class="mb-3">
      <label for="password" class="form-label">New Password</label>
      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
      @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="passwordconf" class="form-label">Confirm New Password</label>
      <input type="password" name="passwordconf" class="form-control @error('passwordconf') is-invalid @enderror" id="passwordconf">
      @error('passwordconf')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
