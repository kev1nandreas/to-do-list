@extends('layouts.main')

@section('container')

<h1 class="h1">Change Password for {{ $user->name }}</h1>

<form method="POST" action="/profile/newpassword">
    @csrf

    <div class="mb-3">
      <label for="password" class="form-label">New Password</label>
      <input type="password" name="password" class="form-control" id="password">
    </div>
    <div class="mb-3">
      <label for="passwordconf" class="form-label">Confirm New Password</label>
      <input type="password" name="passwordconf" class="form-control" id="passwordconf">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection