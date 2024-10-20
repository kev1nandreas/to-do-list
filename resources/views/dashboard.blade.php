@extends('layouts.main')

@section('container')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

<style>
  .btn-transparent {
    background-color: transparent;
    border: none;
    color: inherit;
    cursor: pointer;
    padding: 0;
    font: inherit;

  }

  .btn-transparent:hover {
    color: blue;

    /* Adds a red glow effect */
  }

  .d-inline {
    display: inline-block;
    vertical-align: middle;
  }

  .table {
    border-color: black;
  }

  .table-hover th,
  .table-hover td {
    border: 1px solid #ddd;
    padding: 8px;
    border-color: #444;
  }

  .table-hover th {
    background-color: lightgray;
    text-align: center;
  }

  .table-hover tbody td:nth-child(1) {
    background-color: #E3E3FF;
    text-align: center;
  }

  .table-hover tbody td:nth-child(2) {
    background-color: #DFF2FD;
  }

  .table-hover tbody td:nth-child(3) {
    background-color: #E2FCE6;
  }

  .table-hover tbody td:nth-child(4) {
    background-color: #FCFADE;
  }

  .table-hover tbody td:nth-child(5) {
    background-color: #FFEEE2;
  }

  .table-hover tbody td:nth-child(6) {
    background-color: #FFDBDB;
    justify-content: center;
  }
</style>


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome {{ auth()->user()->name }}</h1>
    </div>

<div class="flex">
  <div>
    <a href="/task/create">
      <button type="button" class="btn btn-dark">Add New Task</button>
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
        <th scope="col style=width: 30rem;">
          <button class="sort-btn" id="sortNo">
            No
            <i class="bi bi-arrow-down-up"></i>
          </button>
        </th>
        <th class="w-[15rem]" scope="col">Name</th>
        <th scope="col">
          <button class="sort-btn" id="sortDate">
            Due Date
            <i class="bi bi-arrow-down-up"></i>
          </button>
        </th>
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
          <button type="button" class="btn-transparent d-inline" onclick="window.location.href='/task/{{ $task->id }}/edit'">
            <i class="inline-block" data-feather="edit"></i>
          </button>

          <button type="button" class="btn-transparent d-inline" onclick="window.location.href='/task/{{ $task->id }}/changestatus'">
            <i class="inline-block" data-feather="check-circle"></i>
          </button>

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
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Select all sorting buttons
    const sortButtons = document.querySelectorAll('.sort-btn');

    // Add click event listeners to each button
    sortButtons.forEach(button => {
      button.addEventListener('click', function() {
        // Get the current order (asc or desc) and toggle it
        const currentOrder = button.getAttribute('data-order');
        const newOrder = currentOrder === 'asc' ? 'desc' : 'asc';
        button.setAttribute('data-order', newOrder);

        // Toggle the icon based on the new order
        const icon = button.querySelector('i');
        if (newOrder === 'asc') {
          icon.classList.remove('bi-arrow-down');
          icon.classList.add('bi-arrow-up');
        } else {
          icon.classList.remove('bi-arrow-up');
          icon.classList.add('bi-arrow-down');
        }

        // Add your sorting logic here based on newOrder value
        // Example: sortTable(button.id, newOrder);
      });
    });
  });
</script>


@endsection