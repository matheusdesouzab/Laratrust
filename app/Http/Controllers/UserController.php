<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index')->with('users' , $users);
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
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('dialhost')
        ]);

        $this->addRole($user->id, $request->role_id);

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
        $user = User::find(Auth()->user()->id);

        if(!$user->hasPermission('show-user')){
            return redirect('users');
        }
        
        $user = User::find($id);
        $roles = Role::all();
        $permissions = $user->allPermissions();
        $rolesUser = $user->roles;

        return view('users.show')->with([
            'user' => $user, 
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
        $user = User::find($id);
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
        $user = User::find($request->user_id);
        $user->attachRole($request->role_id);

        return redirect('users/'.$user->id);
    }

    public function removeRole($role_id, $user_id){
        $user = User::find($user_id);
        $user->detachRole($role_id);

        return redirect('users/'.$user->id);
    }
}
