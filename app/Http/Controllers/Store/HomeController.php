<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;

use App\User;
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
    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */

    public function index(): View
    {
        if (!Auth::guest()) {
            //un administrador habilitado sólo puede hacer mantenimiento
            if (Auth::user()->role == User::ADMIN_ROLE
                && Auth::user()->status == User::ENABLE_STATUS
            ) {
                return view('home');
            }
        }
        //Todo usuario diferente al administrador habilitado puede ver la tienda
        return view('store.home');
    }

}
