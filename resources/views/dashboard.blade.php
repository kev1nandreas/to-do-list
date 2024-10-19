@extends('layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome {{ auth()->user()->name }}</h1>
    </div>

    <a href="">
        <button type="button" class="btn btn-primary">Add New Task</button>
    </a>
    
    <div class="overflow-scroll mt-3">
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th class="w-[15rem]" scope="col">Name</th>
            <th scope="col">Due Date</th>
            <th class="hidden md:table-cell w-[25rem]" scope="col">Description</th>
            <th class="w-[6rem]" scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($tasks as $task)
          <tr>
            <td>{{ $loop->iteration }}</th>
            <td>{{ $task->name }}</td>
            <td>{{ $task->due_date }}</td>
            <td class="hidden md:table-cell">{{ $task->description }}</td>
            @if ($task->status)
                <td class="text-success">Done</td>
            @else
                <td class="text-danger">Not Done</td>
            @endif
            <td>
                <a href="/task/{{ $task }}/edit"><i class="inline-block" data-feather="edit"></i></a>
                <a href=""><i class="inline-block" data-feather="check-circle"></i></a>
            </td>
          </tr>
        @endforeach
        </tbody>
    </table>
    </div>

    

@endsection