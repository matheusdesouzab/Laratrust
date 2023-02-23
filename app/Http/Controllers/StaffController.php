<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Spatie\Activitylog\Models\Activity;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Resources\StaffResource;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index()
    {
        $collection = StaffResource::collection(Staff::all())->toArray(request());
        return view('users.index')->with('users', $collection);
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create')->with('roles', $roles);
    }

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

    public function show($id)
    {
        $staff = Staff::find(Auth()->user()->id);

        if (!$staff->hasPermission('show-user')) {
            return redirect('users');
        }

        $activitys = DB::table('activity_log')
        ->select('activity_log.id as id_activity', 
                 'activity_log.log_name as activity',
                 'activity_log.description as description',
                 'staff_subject.name as subject',
                 'activity_log.created_at as created_at',
                 'activity_log.properties as properties')
        ->leftJoin('staff as staff_subject', 'staff_subject.id', '=', 'activity_log.subject_id')
        ->where('activity_log.causer_id', $id)
        ->get();

        $staff = Staff::find($id);
        $roles = Role::all();
        $permissions = $staff->allPermissions();
        $rolesUser = $staff->roles;

        return view('users.show')->with([
            'user' => $staff,
            'permissions' => $permissions,
            'roles' => $roles,
            'role_users' => $rolesUser,
            'activitys' => $activitys
        ]);
    }

    public function edit($id)
    {
        $user = Staff::find($id);
        return view('users.edit')->with(['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::find($id);
        // $staff->name = $request->name;
        // $staff->email = $request->email;

        // $staff->save();

        $staff->firstwhere('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect('users');
    }

    public function addRole(Request $request)
    {
        $user = Staff::find($request->user_id);
        $user->attachRole($request->role_id);

        return redirect('users/' . $user->id);
    }

    public function removeRole($role_id, $user_id)
    {
        $user = Staff::find($user_id);
        $user->detachRole($role_id);

        return redirect('users/' . $user->id);
    }

    public function destroy($id)
    {
        Staff::find($id)->delete();
        return redirect('users');
    }

}
