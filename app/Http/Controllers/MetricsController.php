<?php

namespace App\Http\Controllers;

use App\Http\Requests\MetricsRequest;
use App\Metrics\MetricsManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        return view('products.reports', compact('result', 'typeChart'));
    }

    /**
     * Create chart with using defined param.
     *
     * @param MetricsRequest $request
     * @return View
     */
    public function show(MetricsRequest $request):View
    {
        $typeChart = $request->input('typeChart');

        $reportType = $request->input('reportType');

        $metric = config('metrics.' . $reportType) ?? abort(404);

        $result = (new MetricsManager(new $metric()))->read($request->all());

        return view('products.reports', compact('result', 'typeChart', 'reportType'));
    }
}
