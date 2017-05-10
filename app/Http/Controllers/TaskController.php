<?php

namespace App\Http\Controllers;

use App\Task;

use Illuminate\Http\Request;

use Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // THOUGHT: You could also order them by deadline to give a sense of
        //          urgence to a task higher in the list...
        $tasks = Task::orderBy('created_at', 'asc')
                     ->get();

        return view('tasks.index')->withTasks($tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form input.
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'dead_at'     => 'required|date_format:Y-m-d',
            'progress'    => 'required|numeric|between:0,100'
        ]);

        if ($validator->fails()) {
            return redirect()->route('tasks.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        Task::create($request->all());

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    // public function show(Task $task)
    // {
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit')->withTask($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        // Validate the form input.
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'dead_at'     => 'required|date_format:Y-m-d',
            'progress'    => 'required|numeric|between:0,100'
        ]);

        if ($validator->fails()) {
            return redirect()->route('tasks.edit', ['id' => $task->id])
                        ->withErrors($validator)
                        ->withInput();
        }

        $task->update($request->all());

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
