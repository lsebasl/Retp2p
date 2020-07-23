<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsStoreSearchRequest;
use App\Mark;
use App\Product;
use App\Sidebar;
use Faker\Guesser\Name;
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
     * @param ProductsStoreSearchRequest $request
     * @return View
     */
    public function index(ProductsStoreSearchRequest $request):View
    {

        $products = Product::where('category', 'Mobiles')
            ->where('status', 'enable')
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->price($request->get('price'))
            ->name($request->get('name'))
            ->mark($request->get('mark'))
            ->paginate(9);


        return view('store.smartphones', compact('products'));
    }

    public function searchMark($sidebar)
    {
        $products = Product::where('category', 'Mobiles')
            ->where('status', 'enable')
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->SearchByMark($sidebar)
            ->paginate(6);

            return view('store.smartphones', compact('products'));
    }



}
