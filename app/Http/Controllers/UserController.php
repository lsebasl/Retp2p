<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

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
     *
     */

    public function index(): View
    {
        $key = "users.page." . request('page',1);//users.page.1 default

        $user= Cache::remember($key,900,function (){

            return User::orderBy('created_at', 'DESC')->paginate();
        });

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
        $admin = Auth::user()->getFullName();

        Log::info("Showing user profile: $user to Admin: $admin ");

        $user = Cache::remember("'user'.{$user}",900,function() use ($user) {

            return $user;
        });

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
        $admin = Auth::user()->getFullName();

        Log::info("Edited user profile: $user by Admin: $admin ");

        $user = Cache::remember("'user'.{$user}",900,function() use ($user) {

            return $user;
        });

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
        $admin = Auth::user()->getFullName();

        Log::info("Updated user profile: $user by Admin: $admin ");

        $user->update($request->validated());

        Cache::flush();

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
        $admin = Auth::user()->getFullName();

        Log::info("Deleted profile: $user by Admin: $admin ");

        $user->delete();

        Cache::flush();
        return redirect()->route('users.index')->with('success', 'Client Has Been Deleted!');

    }


}
