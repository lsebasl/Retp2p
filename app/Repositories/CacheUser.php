<?php


namespace App\Repositories;


use App\User;
use Illuminate\Support\Facades\Cache;

class CacheUser
{
    protected $cacheUser;

    public function __construct(cacheUser $cacheUser)

    {
        $this->$cacheUser = $cacheUser;
    }

    public function getPaginated()
    {
        $key = "users.page." . request('page',1);//users.page.1 default

        return Cache::tags('users')->rememberForever($key,function (){

            return $this->cacheUser->getPaginated();
        });
    }
    public function update($request,$user)
    {

    }
    public function delete($user)
    {

    }
}
