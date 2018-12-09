<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Redirect;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $companyId = Auth::user()->company()->id;
        // $users = Company::where('id', $companyID)->user()->paginate();
        $users = User::paginate();

        return view('users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        $roles = Role::all();

        return view('users.create', compact('permissions', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }

        $request['password'] = Hash::make(request('password'));
        
        $user = User::create($request->all());

        $user->permissions()->sync($request->get('permissions'));

        $user->roles()->sync($request->get('roles'));

       // $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'User created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $permissions = Permission::all();
        $checked_permissions = $user->permissions()->get();
        //$checked_permissions = $user->permissions()->pluck('permission_id');

        $roles = Role::all();
        $checked_roles = $user->roles()->get();
        return view('users.edit', compact('user', 'permissions', 'checked_permissions', 'roles', 'checked_roles'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
        ]);

        $user->name = request('name');

        if (request('password')) {
            $this->validate(request(), [
                'password' => 'string|min:6|confirmed|max:191',
            ]);

            $user->password = Hash::make(request('password'));
        }

        if($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }

       // $user->update($request->all());
        $user->save();

        $user->permissions()->sync($request->get('permissions'));

        $user->roles()->sync($request->get('roles'));

        return back()->with('status', 'Profile updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('status', 'User deleted');
    }
}
