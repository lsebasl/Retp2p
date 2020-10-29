<?php

namespace App\Repositories;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleRepository
{
    /**
     * Returns the product according to the specific search in product.index.
     *
     * @param  $request
     * @param  $pages
     * @return LengthAwarePaginator
     */
    public function getPaginated($request, $pages):LengthAwarePaginator
    {
        return Role::orderBy('created_at', request('sorted', 'ASC'))->name($request->get('name'))->paginate($pages);
    }

    /**
     *
     * @return mixed
     */
    public function getPermissions()
    {
        return  Permission::get();
    }

    /**
     *
     * @param $id
     * @return mixed
     */
    public function findOrFail($id)
    {
        return  Role::findOrFail($id);
    }

    /**
     *
     * @param Request $request
     * @param Role $role
     * @return mixed
     */
    public function updateNameDescription(Request $request,Role $role)
    {
        $role->name = $request->input('name');

        $role->description = $request->input('description');

        $role->save();

        return $role;

    }

    public function createNameDescription(Request $request,$role)
    {
        $role = Role::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return $role;

    }

}
