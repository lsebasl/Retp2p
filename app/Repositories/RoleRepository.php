<?php

namespace App\Repositories;

use App\Cart;
use App\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
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
     * @param $id
     * @return mixed
     */
    public function findOrFail($id)
    {
        return  Role::findOrFail($id);
    }

    /**
     * Store a validated product.
     *
     * @param  $request
     * @return Product
     */
    public function store($request):Product
    {

    }

    /**
     * Fill product using product request validated.
     *
     * @param  $product
     * @param  $request
     * @return mixed
     */
    public function fillProduct($product, $request):Product
    {

    }

    /**
     * Fill product using product request validated.
     *
     * @param  $product
     * @param  $request
     * @return mixed
     */
    public function update($product, $request):Product
    {

    }

    /**
     * Delete a image in storage/app/images.
     *
     * @param  $product
     * @return bool
     */
    public function deleteImage($product):bool
    {

    }

    /**
     * Delete a specific product it affects stocks, products and store.
     *
     * @param  $product
     * @return Product
     */
    public function deleteProduct($product):Product
    {

    }




}
