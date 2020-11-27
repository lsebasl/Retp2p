<?php

namespace App\Repositories;

use App\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

class ProductRepository
{
    /**
     * Returns the product according to the specific search in product.index.
     *
     * @param  $request
     * @param  $pages
     * @return LengthAwarePaginator
     */
    public function getPaginated($request,$pages):LengthAwarePaginator
    {
        return Product::orderBy('created_at', request('sorted', 'DESC'))
            ->name($request->get('search-name'))
            ->category($request->get('search-category'))
            ->mark($request->get('search-mark'))
            ->status($request->get('search-status'))
            ->paginate($pages);
    }

    /**
     * Store a validated product.
     *
     * @param  $request
     * @return Product
     */
    public function store($request):Product
    {
        $product = new Product($request->validated());

        return $this->saveImage($request, $product);
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
        $product->fill($request->validated());

        return $this->saveImage($request, $product);
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
        $product->update(array_filter($request->validated()));

        return $product;
    }

    /**
     * Delete a image in storage/app/images.
     *
     * @param  $product
     * @return bool
     */
    public function deleteImage($product):bool
    {
        return Storage::delete($product->image);
    }

    /**
     * Delete a specific product it affects stocks, products and store.
     *
     * @param  $product
     * @return Product
     */
    public function deleteProduct($product):Product
    {
        $product->delete();

        return $product;
    }

    /**
     * Save a image in storage/app/images.
     *
     * @param  $request
     * @param  $product
     * @return Product
     */
    private function saveImage($request, $product):Product
    {
        $product->image = $request->file('image')->store('images');

        $product->save();

        return $product;
    }

    /**
     * Obtain a specif price searching by the product id.
     *
     * @param  $productId
     * @return mixed
     */
    public function getPrice($productId):int
    {
        return  Product::where('id', $productId)->first()->price;

    }

    /**
     * Obtain a specif discount searching by the product id.
     *
     * @param  $productId
     * @return mixed
     */
    public function getDiscount($productId)
    {
        return  Product::where('id', $productId)->first()->discount;
    }
}
