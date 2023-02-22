<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Resources\StaffResource;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = StaffResource::collection(Staff::all())->toArray(request());

        return view('users.index')->with('users' , $collection);
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
        //dd(Gravatar::fallback('http://urlto.example.com/avatar.jpg')->get('matheus@gmail.com'));

        // $avatar = \Avatar::create('John Doe')->toBase64();

        // dd($avatar);

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
