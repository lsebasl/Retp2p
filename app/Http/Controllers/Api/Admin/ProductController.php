<?php

namespace App\Http\Controllers\Api\Admin;

use App\Actions\StoreProductAction;
use App\Actions\UpdateProductAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\StoreRequest;
use App\Http\Requests\Products\UpdateRequest;
use App\Http\Requests\ProductsStoreRequest;
use App\Http\Requests\ProductsUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Product;
use App\Traits\ApiResponse;
use Illuminate\Validation\ValidationException;
use Throwable;

class ProductController extends Controller
{

    /**
     * Display a listing of the products like image gallery.
     *
     */
    public function index()
    {
        return new ProductResource(Product::paginate());
    }


    public function store(ProductsStoreRequest $request, Product $product, StoreProductAction $action)
    {

        return $action->execute($product, $request);


    }

    public function update(ProductsUpdateRequest $request, Product $product, UpdateProductAction $action)
    {
        return $action->execute($product, $request);
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(__('The Product was successfully deleted'));
    }

}
