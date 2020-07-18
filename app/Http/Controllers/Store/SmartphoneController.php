<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Mark;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;


class SmartphoneController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {


    }

    /**
     * Show the about us in the store.
     *
     * @param  Request $request
     * @return View
     */
    public function index(Request $request):View
    {
        $name = $request->get('name');
        $mark = $request->get('mark');

        $products = Product::where('category', 'Mobiles')
            ->where('status', 'enable')
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->name($name)
            ->mark($mark)
            ->paginate(9);

        $marks = Mark::all();

        return view('store.smartphones', compact('products','marks'));
    }

}
