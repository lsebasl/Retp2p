<?php
namespace App\Repositories;

use App\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Role;

class cacheRoles
{
    protected $roleRepository;


    public function __construct(ModelRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * put cache to products list
     *
     * @param Role $role
     * @return LengthAwarePaginator
     */
    public function getPaginated(Role $role):LengthAwarePaginator
    {
        $key = "roles.page." . request('page', 1);//users.page.1 default

        Cache::tags('roles')->flush();

        return Cache::tags('roles')->rememberForever(
            $key,
            function () use ($role) {

                return $this->roleRepository->getPaginated($role);
            }
        );
    }


}
