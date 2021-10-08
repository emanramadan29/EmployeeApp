<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Add_Department', ['only' => ['index,create','store']]);
        $this->middleware('permission:Edit_Department', ['only' => ['index,edit','update']]);
        $this->middleware('permission:Delete_Department', ['only' => ['index,destroy']]);
    }

    function index()
    {
        $departments = Department::orderBy('created_at')->where('user_id',auth()->user()->id)->paginate(10);
        return view('admin.department.index', compact('departments'));
    }

    function create()
    {
        return view('admin.department.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $department = new Department();
        $department->name = $request->name;
        $department->user_id = auth()->user()->id;
        $department->save();

        Toastr::success('Department added successfully!');
        return redirect(route('dept'));
    }

    public function edit($id)
    {
        $department = Department::find($id);
        return view('admin.department.edit', compact('department'));
    }


    public function update(Request $request, $id)
    {
        $department = Department::find($id);

        $request->validate([
            'name' => 'required|string',

        ]);
        $department->name = $request->name;
        $department->save();
        Toastr::success('Department updated successfully!');
        return redirect(route('dept'));
    }

    public function delete(Request $request)
    {
        $department = Department::find($request->id);
        $department->delete();
        Toastr::success('Department removed!');
        return redirect(route('dept'));
    }
}

