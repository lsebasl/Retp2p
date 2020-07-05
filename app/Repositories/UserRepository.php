<?php

namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class UserRepository
{

    public function getPaginated()
    {
        return User::orderBy('created_at', 'DESC')->paginate();
    }

    public function cacheFindByUser(User $user)
    {
        return $user;
    }

    public function update($request,$user)

    {
        return $user->update($request->validated());
    }

    public function delete($user)

    {
        $user->delete();
    }

}
