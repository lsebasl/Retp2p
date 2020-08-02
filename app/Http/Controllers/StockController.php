<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsSearchRequest;
use App\Product;
use App\Repositories\ProductRepository;
use Illuminate\View\View;

class StockController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the clients..
     *
     * @param  ProductsSearchRequest $request
     * @return View
     */

    public function index(ProductsSearchRequest $request):View
    {
        $product = $this->productRepository->getPaginated($request, 20);

        return view('stocks.index', ['products' => $product]);
    }
}
