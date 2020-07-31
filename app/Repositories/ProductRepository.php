<?php

namespace App\Repositories;

use App\Product;
use Illuminate\Support\Facades\Storage;

class ProductRepository
{
    /**
     * @param  $request
     * @return mixed
     */
    public function getPaginated($request)
    {
        return Product::orderBy('created_at', request('sorted', 'DESC'))
            ->name($request->get('search-name'))
            ->category($request->get('search-category'))
            ->status($request->get('search-status'))
            ->paginate(8);
    }

    /**
     * @param  $request
     * @return Product
     */
    public function store($request)
    {
        $product = new Product($request->validated());

        $product->image = $request->file('image')->store('images');

        $product->save();

        return $product;
    }

    /**
     * @param  $product
     * @param  $request
     * @return mixed
     */
    public function saveImage($product, $request)
    {
        $product->fill($request->validated());

        $product->image = $request->file('image')->store('images');

        $product->save();

        return $product;
    }

    /**
     * @param  $product
     * @param  $request
     * @return mixed
     */
    public function update($product, $request)
    {
        $product->update(array_filter($request->validated()));

        return $product;
    }

    /**
     * @param  $product
     * @return bool
     */
    public function deleteImage($product)
    {
        return Storage::delete($product->image);
    }

    /**
     * @param  $product
     * @return mixed
     */
    public function delete($product)
    {
        $product->delete();

        return $product;
    }
}
