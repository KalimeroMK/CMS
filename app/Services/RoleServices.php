<?php


namespace App\Services;


use App\Http\Requests\Roles\Update;
use App\Http\Requests\Rules\Store;
use DB;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleServices
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        return Role::orderBy('id', 'DESC')->paginate(5);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \App\Models\Permission[]|Collection
     */
    public function create()
    {
        return Permission::get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Store $request
     *
     * @return void
     */
    public function store(Store $request)
    {
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     *
     * @return array
     */
    public function show(Role $role)
    {
        Return Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=",
            "permissions.id")
            ->where("role_has_permissions.role_id", $role)
            ->get();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     *
     * @return array
     */
    public function edit(Role $role)
    {
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $role)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return compact('role', 'permission', 'rolePermissions');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Role $role
     * @param Update $request
     *
     * @return void
     */
    public function update(Role $role, Update $request)
    {

        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     *
     * @return void
     * @throws Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();

    }
}
