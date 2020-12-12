<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RolesDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RolesDataTable $rolesDataTable)
    {
        return $rolesDataTable->render('admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Role $role)
    {
        $permissions = Permission::orderBy('name', 'asc')->get();
        return view('admin.roles.create', compact('role', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create($request->validate($this->rules(), $this->message()));
        $role->givePermissionTo(Permission::whereIn('id', $request->permissions)->get());
        return redirect(route('role.index'))->with('success', 'Inserted Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('name', 'asc')->get();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->update($request->validate($this->rules($role->id), $this->message()));
        $role->givePermissionTo(Permission::whereIn('id', $request->permissions)->get());
        return redirect(route('role.index'))->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return response(['success' => true, 'message' => 'Role Deleted'], 200);
    }

    public function rules($id = 0)
    {
        return [
            'name' => "required|string|max:255|unique:roles,name,{$id},id",
            'guard_name' => "required|string|max:255",
            'permissions.*' => ["required", "exists:permissions,id"]
        ];
    }

    public function message()
    {
        return [];
    }
}
