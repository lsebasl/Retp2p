<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {

    }

    /**
     * Display the specified resource.
     *
     * @return View
     */

    public function index(): View
    {
        $user = User::orderBy('created_at','DESC')->paginate();

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

        $user->update($request->validated());


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
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Client Has Been Deleted!');

    }


}
