<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Task;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Add_Task', ['only' => ['index,create','store']]);
        $this->middleware('permission:Edit_Task', ['only' => ['index,edit','update']]);
        $this->middleware('permission:Delete_Task', ['only' => ['index,destroy']]);
    }

    function index()
    {
        $tasks = Task::orderBy('created_at')->where('user_id',auth()->user()->id)
            ->with('emp')->paginate(10);
        return view('admin.task.index', compact('tasks'));
    }

    function create()
    {
        $employees = Employee::orderBy('created_at')->where('user_id',auth()->user()->id)->paginate(10);
        return view('admin.task.create',compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'employee_id' => 'required',
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->employee_id = $request->employee_id;
        $task->user_id = auth()->user()->id;
        $task->save();

        Toastr::success('Task added successfully!');
        return redirect(route('task'));
    }

    public function edit($id)
    {
        $task = Task::find($id);
        $employees = Employee::orderBy('created_at')->where('user_id',auth()->user()->id)->paginate(10);
        return view('admin.task.edit', compact('task','employees'));
    }


    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
        ]);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->employee_id = $request->employee_id;
        $task->save();
        Toastr::success('Task updated successfully!');
        return redirect(route('task'));
    }

    public function delete(Request $request)
    {
        $task = Task::find($request->id);
        $task->delete();
        Toastr::success('Task removed!');
        return redirect(route('task'));
    }
}

