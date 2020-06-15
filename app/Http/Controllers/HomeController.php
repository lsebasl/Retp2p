<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index():View
    {
        return view('home');
    }
}
