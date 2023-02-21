<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Role;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all();
        return view('users.index')->with('users' , $staff);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $staff = Staff::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('dialhost')
        ]);

        $staff->detachRole($request->role_id);

        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = Staff::find(Auth()->user()->id);

        if(!$staff->hasPermission('show-user')){
            return redirect('users');
        }
        
        $staff = Staff::find($id);
        $roles = Role::all();
        $permissions = $staff->allPermissions();
        $rolesUser = $staff->roles;

        return view('users.show')->with([
            'user' => $staff, 
            'permissions' => $permissions, 
            'roles' => $roles, 
            'role_users' => $rolesUser
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Staff::find($id);
        return view('users.edit')->with(['user' => $user]);
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
        //
    }

    public function addRole(Request $request){
        $user = Staff::find($request->user_id);
        $user->attachRole($request->role_id);

        return redirect('users/'.$user->id);
    }

    public function removeRole($role_id, $user_id){
        $user = Staff::find($user_id);
        $user->detachRole($role_id);

        return redirect('users/'.$user->id);
    }
}
