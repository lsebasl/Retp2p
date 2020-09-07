<?php
namespace App\Repositories;

use App\Product;
use App\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class CacheUser
{
    protected $modelRepository;

    public function __construct(ModelRepository $modelRepository)
    {
        $this->modelRepository = $modelRepository;
    }

    /**
     * put cache to products list
     *
     * @param  User $user
     * @return LengthAwarePaginator
     */
    public function getPaginated(User $user):LengthAwarePaginator
    {
        $key = "users.page." . request('page', 1);//users.page.1 default

        Cache::tags('users')->flush();

        return Cache::tags('users')->rememberForever(
            $key,
            function () use ($user) {

                return $this->modelRepository->getPaginated($user);
            }
        );
    }

    /**
     * put cache to product show
     *
     * @param  User $user
     * @return User
     */
    public function cacheFindByModel(User $user):User
    {
        return Cache::tags('users')->rememberForever(
            "'user'.{$user}",
            function () use ($user) {

                    return $this->modelRepository->cacheFindByModel($user);
            }
        );
    }

    /**
     * @param  $request
     * @param  $user
     * @return User
     */
    public function update($request, $user):User
    {
        $this->modelRepository->update($request, $user);

        Cache::tags('users')->flush();

        return $user;
    }

    /**
     *
     * @param  $user
     * @return User
     */
    public function delete($user):User
    {
        $this->modelRepository->delete($user);

        Cache::tags('users')->flush();

        return $user;
    }
}
