<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReportController extends Controller
{

    /**
     * Display a listing of the stock..
     *
     * @return View
     */
    public function index():View
    {
        return view('products.reports');
    }

    public function all(Request $request)
    {
        $product = Product::orderBy('created_at', request('sorted', 'DESC'))->get();

        return response(json_encode($product),200)->header('Content-type','text/plain');
    }
}
