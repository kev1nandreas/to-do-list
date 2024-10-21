@extends('layouts.main')

@section('container')
    <h1 class="h1 my-4">Edit Settings for {{ $user->name }}</h1>

    <form method="POST" action="/settings/{{ $user->username }}">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="notify_before" class="form-label">Remind Before</label>
            <input type="number" name="notify_before" class="form-control max-w-[10rem]" id="notify_before"
                value={{ $user->notify_before }}>
        </div>

        <div class="mb-3 form-check">
            <input type="hidden" name="notify_me" value="0">
            <input type="checkbox" class="form-check-input" name="notify_me" id="notify-me" value="1"
                {{ $user->notify_me ? 'checked' : '' }}>
            <label class="form-check-label" for="notify-me">Notify me</label>
        </div>

        <button type="submit" class="btn btn-primary">Configure</button>
    </form>
@endsection
