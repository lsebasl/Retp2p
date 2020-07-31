<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsSearchRequest;
use App\Product;
use Illuminate\View\View;

class StockController extends Controller
{
    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the clients..
     *
     * @param  ProductsSearchRequest $request
     * @return View
     */

    public function index(ProductsSearchRequest $request):View
    {
        $product = Product::orderBy('created_at', request('sorted', 'DESC'))
            ->name($request->get('search-name'))
            ->category($request->get('search-category'))
            ->status($request->get('search-status'))
            ->paginate(20);

        return view('stocks.index', ['products' => $product]);
    }
}
