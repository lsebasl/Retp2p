<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UpdateProductAction extends Action
{
    /**
     * * Create the data to update a product.
     *
     * @param  Model   $product
     * @param  Request $request
     * @return Model
     */
    public function storeModel(Model $product, Request $request): Model
    {
        $product->barcode = $request->input('barcode');
        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->model = $request->input('model');
        $product->mark = $request->input('mark');
        $product->description = $request->input('description');
        $product->units = $request->input('units');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount');
        $product->status = $request->input('status');
        $product->image = $request->file('image')->store('images');

        $product->save();

        return $product;
    }
}
