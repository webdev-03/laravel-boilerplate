<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PermissionsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PermissionsDataTable $permissionsDataTable)
    {
        return $permissionsDataTable->render('admin.permissions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Permission $permission)
    {
        return view('admin.permissions.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules(), $this->message());
        Permission::create($validated);
        return redirect(route('permission.index'))->with('success', 'Inserted Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->validate($this->rules($permission->id), $this->message()));
        return redirect(route('permission.index'))->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($permission)
    {
        $permission = Permission::findById($permission);
        if (!$permission) {
            return response(['success' => false, 'message' => 'Data not found'], 404);
        }
        return response(['success' => $permission->delete(), 'message' => 'Data deleted'], 200);
    }

    public function rules($id = 0)
    {
        return [
            'name' => "required|string|max:255|unique:permissions,name,{$id},id",
            'guard_name' => "required|string|max:255",
        ];
    }

    public function message()
    {
        return [];
    }
}
