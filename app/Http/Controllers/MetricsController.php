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
     * Show the view in report with the chart and list of invoices by status.
     *
     * @return View
     */
    public function index():View
    {
        $typeChart = 'bar';

        $tittle = 'Sells By Status';

        $ejeX = 'Invoices Status';

        $ejeY = 'Total';

        $result = DB::table('invoices')->select(DB::raw("status as DATA, sum(total) as LABEL"))->groupBy('DATA')->get();

        return view('products.reports', compact('result', 'typeChart', 'tittle', 'ejeX', 'ejeY'));
    }

    /**
     * Create chart with using defined type chart.
     *
     * @param  MetricsRequest $request
     * @return View
     */
    public function show(MetricsRequest $request):View
    {
        $typeChart = $request->input('typeChart');

        $reportType = $request->input('reportType');

        $tittle= config('metrics.' . $reportType.'.tittle');

        $ejeX= config('metrics.' . $reportType.'.ejeX');

        $ejeY= config('metrics.' . $reportType.'.ejeY');

        $metric = config('metrics.' . $reportType.'.class') ?? abort(404);

        $result = (new MetricsManager(new $metric()))->read($request->all());

        return view('products.reports', compact('result', 'typeChart', 'tittle', 'ejeX', 'ejeY'));
    }
}
