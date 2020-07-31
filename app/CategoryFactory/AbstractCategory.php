<?php


namespace App\CategoryFactory;


use App\Product;

abstract class AbstractCategory
{
    public function show($id)
    {
        $product = Product::findOrfail($id);

        return view('store.show', compact('product'));
    }
}
