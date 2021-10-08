<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use App\Models\Permission;
use App\Authorizable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Add_Users', ['only' => ['index,create','store']]);
        $this->middleware('permission:Edit_Users', ['only' => ['index,edit','update']]);
        $this->middleware('permission:Delete_Users', ['only' => ['index,destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = User::all();

        return view('user.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');

        return view('user.new', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required|min:1'
        ]);

        // hash password
        $request->merge(['password' => Hash::make($request->get('password'))]);
        $request->request->add(['email_verified_at' => Carbon::now()]);

        // Create the user
        if ( $user = User::create($request->except('roles', 'permissions')) ) {

            $this->syncPermissions($request, $user);

            Toastr::success('User has been created.!');

        } else {
            Toastr::error('Unable to create user.');
        }

        return redirect(route('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'id');
        $permissions = Permission::all('name', 'id');

        return view('user.edit', compact('user', 'roles', 'permissions'));
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
        $this->validate($request, [
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'required|min:1'
        ]);

        // Get the user
        $user = User::findOrFail($id);

        // Update user
        $user->fill($request->except('roles', 'permissions', 'password'));

        // check for password change
        if($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        // Handle the user roles
        $this->syncPermissions($request, $user);

        $user->save();

        Toastr::success('User has been updated.');

        return redirect(route('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function destroy($id)
    {
        if ( Auth::user()->id == $id ) {

            Toastr::warning('Deletion of currently logged in user is not allowed :(')->important();
            return redirect(route('users'));
        }

        if( User::findOrFail($id)->delete() ) {
            Toastr::success('User has been deleted');
        } else {
            Toastr::success('User not deleted');
        }

        return redirect(route('users'));
    }

    /**
     * Sync roles and permissions
     *
     * @param Request $request
     * @param $user
     * @return string
     */
    private function syncPermissions(Request $request, $user)
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if( ! $user->hasAllRoles( $roles ) ) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);

        return $user;
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);

        return view('admin.profile',compact('user'));
    }

    public function updateProfile(Request $request)
    {


        $user = User::find(Auth::user()->id);

        $this->validate(request(),[
            'email'=>'required|max:255|email|string||unique:users,email,'.$user->id,
        ]);

        if (request('commercialRegistryImage')) {
            $commercialRegistryImage=request('commercialRegistryImage');
            $commercialRegistryImagee = time() . 'commercialRegistryImage.' .$commercialRegistryImage->getClientOriginalExtension();
            $commercialRegistryImage->move(public_path('images/auth/'),$commercialRegistryImagee);
            $user->commercialRegistryImage = $commercialRegistryImagee;
        }

        if (request('taxCardImage')) {
            $taxCardImage=request('taxCardImage');
            $taxCardImagee = time() . 'taxCardImage.' .$taxCardImage->getClientOriginalExtension();
            $taxCardImage->move(public_path('images/auth/'),$taxCardImagee);
            $user->taxCardImage = $taxCardImagee;
        }

        if (request('s14Image')) {
            $s14Image=request('s14Image');
            $s14Imagee = time() . 's14Image.' .$s14Image->getClientOriginalExtension();
            $s14Image->move(public_path('images/auth/'),$s14Imagee);
            $user->s14Image = $s14Imagee;
        }

        if (request('NationalIDImage')) {
            $NationalIDImage=request('NationalIDImage');
            $NationalIDImagee = time() . 'NationalIDImage.' .$NationalIDImage->getClientOriginalExtension();
            $NationalIDImage->move(public_path('images/auth/'),$NationalIDImagee);
            $user->NationalIDImage = $NationalIDImagee;
        }

        if (request('name')) {
            $user->name = request('name');
        }

        if (request('email')) {
            $user->email = request('email');
        }

        if (request('fax')) {
            $user->fax = request('fax');
        }

        if (request('mobile')) {
            $user->mobile = request('mobile');
        }

        if (request('companyName')) {
            $user->companyName = request('companyName');
        }

        if (request('companyAddress')) {
            $user->companyAddress = request('companyAddress');
        }

        if (request('NationalID')) {
            $user->NationalID = request('NationalID');
        }

        if (request('commercialRegistry')) {
            $user->commercialRegistry = request('commercialRegistry');
        }

        if (request('CompanyType')) {
            $user->CompanyType = request('CompanyType');
        }

        if (request('taxCard')) {
            $user->taxCard = request('taxCard');
        }

        if (request('password')) {
            $user->password = Hash::make(request('password'));
        }

        $user->save();

        return redirect()->back()->with('success', trans('lang.saveb'));
    }
}
