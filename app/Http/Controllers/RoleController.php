<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolesSearchRequest;
use App\Repositories\RoleRepository;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * List roles after paginated.
     *
     * @param RolesSearchRequest $request
     * @return View
     */
    public function index(RolesSearchRequest $request)
    {
        $roles = $this->roleRepository->getPaginated($request,10);

        return view('roles.index', compact('roles'));
    }

    /**
     * Create the view to create roles.
     *
     * @param Role $role
     * @return View
     */
    public function create(Role $role):View
    {
        //Logs::AuditLogger($user, 'edit');

        $permissions = Permission::get();

        return view('roles.create', compact('role','permissions'));
    }

    /**
     * Store a newly created role in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request):RedirectResponse
    {

        $role = Role::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        $role->syncPermissions($request->input('permission'));


        return redirect('roles.index')->with('Success','Role Has Benn Created');

    }

    /**
     * Show a specific user
     *
     * @param $id
     * @return View
     */
    public function show($id):View
    {
        // Logs::AuditLogger($user, 'show');

        $role = $this->roleRepository->findOrFail($id);

        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)->get();

        return view('roles.show', compact('role','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest $request
     * @param  User              $user
     * @return RedirectResponse
     */
    public function update(UserUpdateRequest $request, User $user):RedirectResponse
    {
        Logs::AuditLogger($user, 'update');

        $this->cacheUser->update($request, $user);

        return redirect()->route('users.show', $user)->with('success', 'Client Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user):RedirectResponse
    {
        Logs::AuditLogger($user, 'delete');

        $this->cacheUser->delete($user);

        return redirect()->route('users.index')->with('success', 'Client Has Been Deleted!');
    }

}


