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
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Throwable;

class ProductController extends Controller
{

    /**
     *list of the products using api postman.
     *
     * @return ProductResource
     */
    public function index():ProductResource
    {
        return new ProductResource(Product::paginate());
    }

    /**
     * Execute model product with validation and request for create a product since api.
     *
     * @param ProductsStoreRequest $request
     * @param Product $product
     * @param StoreProductAction $action
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(ProductsStoreRequest $request, Product $product, StoreProductAction $action):Model
    {

        return $action->execute($product, $request);


    }

    /**
     * Execute model product with validation and request for update a product since api.
     *
     * @param ProductsUpdateRequest $request
     * @param Product $product
     * @param UpdateProductAction $action
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(ProductsUpdateRequest $request, Product $product, UpdateProductAction $action):Model
    {
        return $action->execute($product, $request);
    }

    /**
     * Return a specific product in api.
     *
     * @param Product $product
     * @return Model
     */
    public function show(Product $product):Model
    {
        return $product;
    }

    /**
     * Delete a specific product since api.
     *
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Product $product):JsonResponse
    {
        $product->delete();

        return response()->json(__('The Product was successfully deleted'));
    }

}
