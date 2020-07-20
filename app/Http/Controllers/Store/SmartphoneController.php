<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
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
     * @param  Request $request
     * @return View
     */
    public function index(Request $request):View
    {
        $name = $request->get('name');
        $mark = $request->get('mark');
        $price = $request->get('price');

        $products = Product::where('category', 'Mobiles')
            ->where('status', 'enable')
            ->orderBy('created_at', request('sorted', 'DESC'))
            ->price($price)
            ->name($name)
            ->mark($mark)
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
