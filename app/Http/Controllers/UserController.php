<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserUpdateRequest;
use App\Logs\AuditLogger;
use App\Repositories\CacheUser;
use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(CacheUser $userRepository)

    {
        $this->userRepository = $userRepository;

    }

    /**
     * Display the specified resource.
     *
     * @return View
     */

    public function index(): View
    {
        $user = $this->userRepository->getPaginated();

        return view('users.index', ['users' => $user]);

    }

    /**
     * Display a listing of the clients..
     *
     * @param User $user
     * @return View
     */

    public function show(User $user):View
    {
        $this->userRepository->logOperation('show',$user);

        $this->userRepository->cacheFindByUser($user);

        return view('users.show', ['user'=> $user]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return View
     */
    public function edit(User $user):View
    {
        $this->userRepository->logOperation('edit',$user);

        $this->userRepository->cacheFindByUser($user);

        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param UserUpdateRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserUpdateRequest $request, User $user):RedirectResponse
    {
        $this->userRepository->logOperation('update',$user);

        $this->userRepository->update($request,$user);

       return redirect()->route('users.show', $user)->with('success', 'Client Has Been Updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user):RedirectResponse
    {
        $this->userRepository->logOperation('delete',$user);

        $this->userRepository->delete($user);

        return redirect()->route('users.index')->with('success', 'Client Has Been Deleted!');

    }


}
