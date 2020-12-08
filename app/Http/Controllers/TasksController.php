<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Http\Resources\TaskResource;
use App\Http\Resources\TaskCollection;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks;
        //$tasks = User::find(1)->tasks;
        //$tasks = Task::all();
        return view('home', compact('tasks'));
    }

    public function index2()
    {
        $tasks = Task::all();
        return new TaskCollection($tasks);
    }

    public function create()
    {
        return view('tasks.create');
    }

	public function show($id)
    {
        $task = Task::find($id); 
        /*
        if (!$task){
            return response()->json('Hiba');
        }        
        */
        return new TaskResource($task);
    }

    public function add()
    {
    	return view('add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required'
        ]);
    	$task = new Task();
    	$task->description = $request->description;
    	$task->user_id = auth()->user()->id;
    	$task->save();
    	return redirect('/home'); 
    }
    

      public function destroy($id)
    {
        $stud = Task::findOrfail($id);
 
        if($stud->delete()) {
            return new TaskResource($stud);
        } 
    }
}
