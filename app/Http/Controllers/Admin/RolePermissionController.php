<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolePermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Add_Role', ['only' => ['index,create','store']]);
        $this->middleware('permission:Edit_Role', ['only' => ['index,edit','update']]);
        $this->middleware('permission:Delete_Role', ['only' => ['index,destroy']]);
    }

    public function index()
    {
        $roles = Role::where('user_id',auth()->user()->id)->get();
        $permissions = Permission::where('user_id',auth()->user()->id)->get();
        return view('role.index', compact('permissions','roles'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:roles']);

        if( Role::create($request->only('name')) ) {
            return redirect()->back()->with('success','Role Added');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($role = Role::findOrFail($id)) {
            // admin role has everything
            if($role->name === 'Super Admin') {
                $role->syncPermissions(Permission::all());
                return redirect()->route('admin.rolePer.add-new');
            }

            $permissions = $request->get('permissions', []);

            $role->syncPermissions($permissions);

            Toastr::success('permissions has been updated!');

        } else {
            Toastr::success('permissions has been updated!');
        }

        return redirect(route('rolePer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->back()->with('success','Role deleted successfully');
    }

}

