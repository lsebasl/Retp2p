<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return View
     */
    public function index():View
    {
        return view('store.home');
    }
}
