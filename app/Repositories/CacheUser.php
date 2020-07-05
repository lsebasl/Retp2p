<?php


namespace App\Repositories;


use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CacheUser
{
    protected $UserRepository;

    public function __construct(UserRepository $UserRepository)

    {
       $this->UserRepository = $UserRepository;
    }

    public function getPaginated()
    {
        $key = "users.page." . request('page',1);//users.page.1 default

        return Cache::tags('users')->rememberForever($key,function () {

            return $this->UserRepository->getPaginated();
        });
    }
        public function cacheFindByUser(User $user)
        {
            return Cache::tags('users')->rememberForever("'user'.{$user}",function() use ($user) {

                return $this->UserRepository->cacheFindByUser($user);
            });

        }
    public function update($request,$user)
    {
        $this->UserRepository->update($request,$user);

        Cache::tags('users')->flush();

        return $user;

    }
    public function delete($user)
    {
        $this->UserRepository->delete($user);

        Cache::tags('users')->flush();

        return $user;
    }
    public function logOperation($action, $model)
    {
        $admin = Auth::user()->getFullName();
        Log::info("Action performed $action over $model by Admin:$admin ");
    }

}
