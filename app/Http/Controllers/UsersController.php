<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UsersController extends Controller
{
    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('verified');
    }

    public function index(): View
    {

        $user = User::all();

        return view('users.index', ['users' => $user]);
    }

    /**
     * Display the specified resource.
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
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return void
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|min:3|max:30',
            'last_name' => 'required|min:3|max:30',
            'id_type' => 'required|in:Foreign ID,Card ID,Passport,NIT',
            'identification' => [
                'required', Rule::unique('users')->ignore($user->id), 'min:3', 'max:20'
            ],
            'phone' => 'required|min:6|max:20',
            'address' => 'required|max:40',
            'email' => ['required','max:150','email',
                Rule::unique('users', 'email')->ignore($user->id)],
        ]);

        $user->update([
            'name' => $request->get('name'),
            'last_name' => $request->get('last_name'),
            'id_type' => $request->get('id_type'),
            'identification' => $request->get('identification'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'status' => $request->get('status')
        ]);

       return redirect()->route('users.show', $user)->with('success', 'Client Has Been Updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back();

    }


}
