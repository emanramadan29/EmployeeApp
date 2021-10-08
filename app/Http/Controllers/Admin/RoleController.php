<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Add_Role', ['only' => ['index,create','store']]);
        $this->middleware('permission:Edit_Role', ['only' => ['index,edit','update']]);
        $this->middleware('permission:Delete_Role', ['only' => ['index,destroy']]);
    }
    function index()
    {
        $roles = Role::orderBy('created_at')->where('user_id',auth()->user()->id)->paginate(10);
        return view('admin.role.index', compact('roles'));
    }

    function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->user_id = auth()->user()->id;
        $role->save();

        Toastr::success('Role added successfully!');
        return redirect(route('role'));
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('admin.role.edit', compact('role'));
    }


    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        $request->validate([
            'name' => 'required',

        ]);
        $role->name = $request->name;
        $role->save();
        Toastr::success('Role updated successfully!');
        return redirect(route('role'));
    }

    public function delete(Request $request)
    {
        $role = Role::find($request->id);
        $role->delete();
        Toastr::success('Role removed!');
        return redirect(route('role'));
    }
}

