<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index():View
    {
        //solo el administrador habilitado puede hacer mantenimiento
        if (Auth::user()->role==User::ADMIN_ROLE
            && Auth::user()->status==User::ENABLE_STATUS){
            return view('home');
        }
        //todo usuario puede ver la tienda
        return view('store.home');
    }

}
