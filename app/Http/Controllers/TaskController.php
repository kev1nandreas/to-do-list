<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task/newtask');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'due_date' => 'required',
            'description' => '',
        ]);

        $validated['user_id'] = auth()->user()->id;
        $validated['due_date'] = Carbon::parse($validated['due_date']);

        dd($validated);

        Task::create($validated);

        return redirect('/')->with('success', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('task/edittask', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'name' => 'required',
            'due_date' => 'required',
        ]);

        $validated['due_date'] = Carbon::parse($validated['due_date']);

        $task->where('id', $task->id)->update($validated);

        return redirect('/')->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/')->with('success', 'Task deleted successfully');
    }

    /**
     * Change the status of the task.
     */
    public function status(Task $task){
        $task->status = !$task->status;
        $task->where('id', $task->id)->update(['status' => $task->status]);

        return redirect('/')->with('success', 'Task status changed successfully');
    }

    /**
     * Find the task with keyword.
    */
    public function find(Request $request){
        $keyword = $request->input('keyword');
    
        $tasks = auth()->user()->tasks();
        
        if($keyword !== null){
            $tasks = $tasks->where('name', 'like', '%'.$keyword.'%');
        }

        $tasks = $tasks->orderBy('status', 'asc')
                       ->orderBy('due_date', 'asc')
                       ->get();
        
        return view('dashboard', ['tasks' => $tasks]);
    }
    
}
