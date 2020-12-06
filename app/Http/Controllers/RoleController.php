<?php

namespace App\Http\Controllers;

use App\Helpers\Logs;
use App\Http\Requests\RolesCreateRequest;
use App\Http\Requests\RolesSearchRequest;
use App\Http\Requests\RolesUpdateRequest;
use App\Repositories\cacheRoles;
use App\Repositories\RoleRepository;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository, cacheRoles $cacheRole)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * List roles after paginated.
     *
     * @param  RolesSearchRequest $request
     * @return View
     */
    public function index(RolesSearchRequest $request):View
    {
        $roles = $this->roleRepository->getPaginated($request, 10);

        return view('roles.index', compact('roles'));
    }

    /**
     * Create the view to create roles.
     *
     * @param  Role $role
     * @return View
     */
    public function create(Role $role):View
    {
        Logs::AuditLogger($role, 'edit');

        $permissions = $this->roleRepository->getPermissions();

        return view('roles.create', compact('role', 'permissions'));
    }

    /**
     * Store a newly created role in storage.
     *
     * @param RolesCreateRequest $request
     * @param Role $role
     * @return RedirectResponse
     */
    public function store(RolesCreateRequest $request, Role $role):RedirectResponse
    {
        Logs::AuditLogger($role, 'store');

        $role = $this->roleRepository->createNameDescription($request, $role);

        $role->syncPermissions($request->input('permission'));

        return redirect(route('roles.index'))->with('success', 'Role Has Been Created!');
    }

    /**
     * Show a specific user
     *
     * @param  $id
     * @return View
     */
    public function show($id):View
    {
        $role = $this->roleRepository->findOrFail($id);

        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)->get();

        return view('roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show a specific user
     *
     * @param  $id
     * @return View
     */
    public function edit($id):View
    {
        $role = $this->roleRepository->findOrFail($id);

        $permissions = $this->roleRepository->getPermissions();

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }


    /**
     * Update a specific roles and create a Log.
     *
     * @param  RolesUpdateRequest $request
     * @param  $id
     * @return RedirectResponse
     */
    public function update(RolesUpdateRequest $request, $id):RedirectResponse
    {
        Logs::AuditLogger('Role', 'store');

        $role = $this->roleRepository->findOrFail($id);

        $role = $this->roleRepository->updateNameDescription($request, $role);

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->withSuccess(__('Role updated sucessfully'));
    }


    /**
     * Delete a specific roles and create a Log.
     *
     * @param  Role $role
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Role $role):RedirectResponse
    {
        Logs::AuditLogger($role, 'delete');

        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role Has Been Deleted!');
    }
}
