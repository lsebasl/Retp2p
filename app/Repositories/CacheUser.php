<?php
namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\Cache;

class CacheUser
{
    protected $modelRepository;

    public function __construct(ModelRepository $modelRepository)

    {
       $this->modelRepository = $modelRepository;
    }

    public function getPaginated(User $user)
    {
        $key = "users.page." . request('page',1);//users.page.1 default

        return Cache::tags('users')->rememberForever($key,function () use ($user){

            return $this->modelRepository->getPaginated($user);
        });
    }
        public function cacheFindByModel(User $user)
        {
            return Cache::tags('users')->rememberForever("'user'.{$user}",function() use ($user) {

                return $this->modelRepository->cacheFindByModel($user);
            });

        }
    public function update($request,$user)
    {
        $this->modelRepository->update($request,$user);

        Cache::tags('users')->flush();

        return $user;

    }
    public function delete($user)
    {
        $this->modelRepository->delete($user);

        Cache::tags('users')->flush();

        return $user;
    }

}
