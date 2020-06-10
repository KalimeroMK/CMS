<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\Update;
use App\Http\Requests\Rules\Store;
use App\Services\RoleServices;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{

    /**
     * @var RoleServices
     */
    private RoleServices $roleServices;

    /**
     * Display a listing of the resource.
     * @param RoleServices $roleServices
     */
    function __construct(RoleServices $roleServices)
    {
        $this->roleServices = $roleServices;
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $roles = $this->roleServices->index($request);
        return view('admin.roles.index', compact('roles'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $permission = $this->roleServices->create();
        return view('admin.roles.create', compact('permission'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Store $request
     *
     * @return RedirectResponse
     */
    public function store(Store $request)
    {
        $this->roleServices->store($request);
        return redirect()->route('roles.index')
        ->with('success', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     *
     * @return Factory|View
     */
    public function show(Role $role)
    {
        $rolePermissions = $this->roleServices->show($role);
        return view('admin.roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     *
     * @return Factory|View
     */
    public function edit(Role $role)
    {
        $data = $this->roleServices->edit($role);
        return view('admin.roles.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Role $role
     * @param Update $request
     *
     * @return RedirectResponse
     */
    public function update(Role $role, Update $request)
    {

        $this->roleServices->update($role, $request);
        return redirect()->route('roles.index')
        ->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Role $role)
    {
        $this->roleServices->destroy($role);
        return redirect()->route('roles.index')
        ->with('success', 'Role deleted successfully');
    }


}
