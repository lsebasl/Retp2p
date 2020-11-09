<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UpdateProductAction extends Action
{
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
        $product->image = $request->input('image');

        $product->save();

        return $product;
    }
}
