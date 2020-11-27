<?php

namespace App\Http\Controllers;

use App\Metrics\MetricsManager;
use App\Metrics\SellsByCategory;
use App\Metrics\SellsByProduct;
use App\Metrics\SellsByStatus;
use App\Metrics\StockByCategory;
use App\Metrics\TopClients;
use App\Metrics\IdType;
use App\Metrics\UsersStatus;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;



class MetricsController extends Controller
{

    /**
     * Display a listing of the stock..
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request):View
    {
        $typeChart = 'bar';

        $result = DB::table('invoices')->select(DB::raw("users_id as DATA, sum(total) as LABEL"))->groupBy('DATA')->get();

        return view('products.reports', compact('result','typeChart'));

    }

    /**
     * @param  Request $request
     * @return View
     */
    public function show(Request $request)
    {
        $typeChart = $request->input('typeChart');

        $reportType = $request->input('reportType');

        $metric = config('metrics.' . $reportType) ?? abort(404);

        $result = (new MetricsManager(new $metric()))->read($request->all());

        return view('products.reports', compact('result','typeChart','reportType'));
    }
}
