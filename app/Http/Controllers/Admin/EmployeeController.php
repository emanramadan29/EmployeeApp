<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Add_Employee', ['only' => ['index,create','store']]);
        $this->middleware('permission:Edit_Employee', ['only' => ['index,edit','update']]);
        $this->middleware('permission:Delete_Employee', ['only' => ['index,destroy']]);
    }

    function index()
    {
        $employees = Employee::orderBy('created_at')->where('user_id',auth()->user()->id)
            ->with('dept')->paginate(10);
        return view('admin.employee.index', compact('employees'));
    }

    function create()
    {
        $departments = Department::orderBy('created_at')->where('user_id',auth()->user()->id)->paginate(10);
        return view('admin.employee.create',compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:employees',
            'email' => 'required|email|unique:employees',
            'phone' => 'required|unique:employees',
            'department_id' => 'required',
        ]);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->department_id = $request->department_id;
        $employee->user_id = auth()->user()->id;
        $employee->save();

        Toastr::success('Employee added successfully!');
        return redirect(route('emp'));
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        $departments = Department::orderBy('created_at')->where('user_id',auth()->user()->id)->paginate(10);
        return view('admin.employee.edit', compact('employee','departments'));
    }


    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $request->validate([
            'email' => ['required', Rule::unique('employees')->ignore($id),],
            'name' => ['required', Rule::unique('employees')->ignore($id),],
            'phone' => ['required', Rule::unique('employees')->ignore($id),],
            'department_id' => 'required',
        ]);

        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->department_id = $request->department_id;
        $employee->save();
        Toastr::success('Employee updated successfully!');
        return redirect(route('emp'));
    }

    public function delete(Request $request)
    {
        $employee = Employee::find($request->id);
        $employee->delete();
        Toastr::success('Employee removed!');
        return redirect(route('emp'));
    }
}

