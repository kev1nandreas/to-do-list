@extends('layouts.main')

@section('container')

<style>
  .btn-transparent {
    background-color: transparent;
    border: none;
    color: inherit;
    cursor: pointer;
    padding: 0;
    font: inherit;
}

.d-inline {
    display: inline-block;
    vertical-align: middle;
}

</style>


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome {{ auth()->user()->name }}</h1>
    </div>

    <div class="flex">
      <div>
        <a href="/task/create">
          <button type="button" class="btn btn-primary">Add New Task</button>
        </a>
      </div>

      <div class="ml-10">
        <form class="row g-3" method="GET" action="/find">
          <div class="col-auto">
            <label for="keyword" class="visually-hidden">Keyword</label>
            <input type="text" name="keyword" class="form-control" id="keyword" value="{{ request('keyword') }}" placeholder="Type Keyword ...">
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-secondary mb-3">Search</button>
          </div>
        </form>
      </div>
    </div>
    
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
              <a href="/task/{{ $task->id }}/edit"><i class="inline-block" data-feather="edit"></i></a>
              <a href="/task/{{ $task->id }}/changestatus"><i class="inline-block" data-feather="check-circle"></i></a>
              <form action="/task/{{ $task->id }}" method="post" class="d-inline">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn-transparent d-inline" onclick="return confirm('Are you sure?')">
                      <i data-feather="trash-2"></i>
                  </button>
              </form>
          </td>
          
          </tr>
        @endforeach
        </tbody>
    </table>
    </div>

    

@endsection