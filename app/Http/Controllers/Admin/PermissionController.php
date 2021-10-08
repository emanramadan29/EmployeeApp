<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Add_Permission', ['only' => ['index,create','store']]);
        $this->middleware('permission:Edit_Permission', ['only' => ['index,edit','update']]);
        $this->middleware('permission:Delete_Permission', ['only' => ['index,destroy']]);
    }



    function index()
    {
        $permissions = Permission::orderBy('created_at')->where('user_id',auth()->user()->id)->paginate(10);
        return view('admin.permission.index', compact('permissions'));
    }

    function create()
    {
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $per = new Permission();
        $per->name = $request->name;
        $per->user_id = auth()->user()->id;
        $per->save();

        Toastr::success('Permission added successfully!');
        return redirect(route('permission'));
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('admin.permission.edit', compact('permission'));
    }


    public function update(Request $request, $id)
    {
        $per = Permission::find($id);

        $request->validate([
            'name' => 'required',

        ]);
        $per->name = $request->name;
        $per->save();
        Toastr::success('Permission updated successfully!');
        return redirect(route('permission'));
    }

    public function delete(Request $request)
    {
        $per = Permission::find($request->id);

        $per->delete();
        Toastr::success('Permission removed!');
        return redirect(route('permission'));
    }
}

