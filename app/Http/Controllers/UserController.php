<?php

namespace App\Http\Controllers;
use App\Helpers\Logs;
use App\Http\Requests\UserUpdateRequest;
use App\Product;
use App\Repositories\CacheUser;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\User;
use Illuminate\View\View;


class UserController extends Controller
{
    protected $cacheUser;

    public function __construct(CacheUser $cacheUser)
    {
        $this->cacheUser = $cacheUser;

    }

    /**
     * Display the specified resource.
     *
     * @param  User    $user
     * @param  Request $request
     * @return View
     */

    public function index(User $user,Request $request): View
    {
        $name = $request->get('name');
        $users= Product::name($name);

        $users = $this->cacheUser->getPaginated($user);

        return view('users.index', ['users' => $users]);

    }

    /**
     * Display a listing of the clients..
     *
     * @param  User $user
     * @return View
     */

    public function show(User $user):View
    {
        Logs::AuditLogger($user, 'show');

        $this->cacheUser->cacheFindByModel($user);

        return view('users.show', ['user'=> $user]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return View
     */
    public function edit(User $user):View
    {
        Logs::AuditLogger($user, 'edit');

        $this->cacheUser->cacheFindByModel($user);

        return view('users.edit', ['user' => $user]);
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
