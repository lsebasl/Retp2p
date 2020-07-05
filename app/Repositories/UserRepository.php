<?php

namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class UserRepository
{
    public function logOperation($action, $model)
    {
        $admin = Auth::user()->getFullName();
        Log::info("Action performed $action over $model by Admin:$admin ");
    }
    public function getPaginated()
    {
            return User::orderBy('created_at', 'DESC')->paginate();
    }

    public function cacheFindByUser(User $user)
    {
        return Cache::tags('users')->rememberForever("'user'.{$user}",function() use ($user) {

            return $user;
        });

    }

    public function update($request,$user)

    {
        Cache::tags('users')->flush();

        return $user->update($request->validated());
    }

    public function delete($user)

    {
        Cache::tags('users')->flush();

        $user->delete();
    }

}
