<?php

namespace App\Repositories;
use App\Product;
use Illuminate\Support\Facades\Storage;


class ProductRepository
{
    public function getPaginated($request)
    {
        return Product::orderBy('created_at', request('sorted', 'DESC'))
            ->name($request->get('search-name'))
            ->category($request->get('search-category'))
            ->status($request->get('search-status'))
            ->paginate(8);
    }

    public function store($request)
    {
        $product = new Product($request->validated());

        $product->image = $request->file('image')->store('images');

        $product->save();

        return $product;


    }

    public function SaveImage($product, $request)
    {
        $product->fill($request->validated());

        $product->image = $request->file('image')->store('images');

        $product->save();

        return $product;
    }

    public function Update($product,$request)

    {
        $product->update(array_filter($request->validated()));

        return $product;
    }

    public function DeleteImage($product)

    {
        return Storage::delete($product->image);
    }


    public function Delete($product)

    {
        $product->delete();

        return $product;


    }


}
