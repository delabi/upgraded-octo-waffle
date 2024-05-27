<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->simplePaginate(3); //paginate(3);

        return view('tasks.index', [
            'tasks' => $tasks
        ]);

    }

    public function create()
    {
        return view ('tasks.create');
    }

    public function show(Task $task){
        return view('tasks.show', ['task' => $task]);
    }

    public function audit(Task $task){
        return view('tasks.audit', ['task' => $task]);
    }

    public function store(){
        request()->validate([
            'code' => ['required', 'min:1'],
            'code_details' => ['required'],
            'discussion' => ['required'],
            'inspection_procedure' => ['required'],
            'primary_benefit' => ['required']

        ]);

        Task::create([
            'code' => request('code'),
            'code_details' => request('code_details'),
            'discussion' => request('discussion'),
            'inspection_procedure' => request('inspection_procedure'),
            'primary_benefit' => request('primary_benefit'),

        ]);

        return redirect('/tasks');

    }

    public function edit(Task $task){
        return view('tasks.edit', ['task' => $task]);

    }

    public function update(Task $task){
         // validate
        request()->validate([
            'code' => ['required', 'min:1'],
            'code_details' => ['required'],
            'discussion' => ['required'],
            'inspection_procedure' => ['required'],
            'primary_benefit' => ['required']
        ]);

        // authorization(on hold)


        // $job = Job::findOrFail($id);

        $task->update([
            'code' => request('code'),
            'code_details' => request('code_details'),
            'discussion' => request('discussion'),
            'inspection_procedure' => request('inspection_procedure'),
            'primary_benefit' => request('primary_benefit'),
        ]);

        return redirect('/tasks/' . $task->id);

    }


    public function destroy(Task $task){
        $task->delete();

        return redirect('/tasks');

    }


}
