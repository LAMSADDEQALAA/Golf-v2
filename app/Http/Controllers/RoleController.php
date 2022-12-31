<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role_or_permission:super-admin|edit-role', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:super-admin|delete-role', ['only' => 'destroy']);
        $this->middleware('role_or_permission:super-admin|add-role', ['only' => 'store']);
        $this->middleware('role_or_permission:super-admin|Update-role-permissions', ['only' => ['EditRolePermissions', 'UpdateRolePermissions']]);
        $this->middleware('role_or_permission:super-admin|view-role', ['only' => 'index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all()->where("name", "!==", "super-admin");
        $permissions = Permission::all();

        $cats = ["role", "user", "terrain", "Ville"];
        $perms = [];
        $vals = [];

        foreach ($cats as $value) {
            $vals = $permissions->filter(function ($perm) use ($value) {
                return Str::contains($perm, $value);
            });
            $perms[$value] = $vals;
        }

        return view("Role.index", ["roles" => $roles, "perms" => $perms]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required',
        ]);

        $data = [
            'name' => $request->role,
        ];

        $role = Role::create($data);
        if (!$role) {
            Session::flash('message', 'Error occured while Soring Role');
            Session::flash('message_type', 'danger');

            return redirect()->back();
        }

        if ($request->permsissions) {
            $role->syncPermissions($request->permsissions);
        }

        Session::flash('message', 'Role Was Stored SuccessFuly');
        Session::flash('message_type', 'success');
        return redirect("/role");
    }
    public function edit(Role $role)
    {
        return response()->json($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'role' => 'required',
        ]);

        $data = [
            'name' => $request->role,
        ];

        if (!Role::where('id', $request->id)
            ->update($data)) {
            Session::flash('message', 'Error occured while updating Role');
            Session::flash('message_type', 'danger');
            return redirect()
                ->back();
        }

        Session::flash('message', 'Role Was updated SuccessFuly');
        Session::flash('message_type', 'success');
        return redirect("/role");
    }


    public function EditRolePermissions(Role $role)
    {
        $perms = $role->permissions->pluck('name');
        $role['permissions'] = $perms;
        return response()->json($role);
    }

    public function UpdateRolePermissions(Request $req)
    {
        $role = Role::find($req->id);
        if (!$role->syncPermissions($req->perms)) {
            Session::flash('message', 'Error occured While Updating role Permissions');
            Session::flash('message_type', 'danger');
            return redirect()
                ->back();
        }
        Session::flash('message', 'role Permissions were Updated');
        Session::flash('message_type', 'success');
        return redirect("/role");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if (!Role::find($role->id)->delete()) {
            Session::flash('message', 'Error occured while Deleting Role');
            Session::flash('message_type', 'danger');
            return redirect()
                ->back();
        }
        Session::flash('message', 'Role Deleted SuccessFuly');
        Session::flash('message_type', 'success');
        return redirect()->back();
    }
}
