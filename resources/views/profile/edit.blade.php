@extends('layouts.main')

@section('container')
    <h1 class="h1">Edit Profile for {{ $user->name }}</h1>

    <form method="POST" action="/profile/{{ $user->username }}">
        @csrf
        @method('put')

        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $user->name }}">
          @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" value="{{ $user->email }}">
          @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="phone" class="form-label">Phone number</label>
          <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ $user->phone }}">
          @error('phone')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ $user->username }}">
          @error('username')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    
@endsection