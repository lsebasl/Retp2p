<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
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
     * @return View
     */
    public function index():View
    {
        return view('store.smartphones');
    }
}
