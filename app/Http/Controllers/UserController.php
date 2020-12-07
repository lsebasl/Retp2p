<?php

namespace App\Http\Controllers;

use App\Helpers\Logs;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\ModelRepository;
use Illuminate\Http\RedirectResponse;
use App\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $modelRepository;

    public function __construct(ModelRepository $modelRepository)
    {
        $this->modelRepository = $modelRepository;
    }

    /**
     * List users after paginated.
     *
     * @param  Request $request
     * @param  User    $user
     * @return View
     */
    public function index(Request $request, User $user): View
    {
        $users = $this->modelRepository->getPaginated($request, $user);

        return view('users.index', ['users' => $users]);
    }

    /**
     * Show a specific user
     *
     * @param  User $user
     * @return View
     */
    public function show(User $user):View
    {
        $roles = Role::get();

        $this->modelRepository->findByModel($user);

        $this->modelRepository->findByModel($roles);

        return view('users.show', ['user'=> $user], ['roles' => $roles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return View
     */
    public function edit(User $user):View
    {
        $roles = Role::get();

        Logs::AuditLogger($user, 'edit');

        $this->modelRepository->findByModel($user);

        return view('users.edit', ['user' => $user], ['roles' => $roles ]);
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

        $user->roles()->sync($request->get('role'));

        $this->modelRepository->update($request, $user);

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

        $this->modelRepository->delete($user);

        return redirect()->route('users.index')->with('success', 'Client Has Been Deleted!');
    }
}
