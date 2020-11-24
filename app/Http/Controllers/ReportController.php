<?php

namespace App\Http\Controllers;

use App\Metrics\MetricsManager;
use App\Metrics\SellsByCategory;
use App\Metrics\SellsByProduct;
use App\Metrics\SellsByStatus;
use App\Metrics\TopClients;
use App\Metrics\StockByCategory;
use App\Metrics\UsersStatus;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;



class ReportController extends Controller
{

    /**
     * Display a listing of the stock..
     *
     * @return View
     */
    public function index(Request $request):View
    {

        $result = DB::table('invoices')->select(DB::raw("users_id as VENDOR, sum(total) as SALES"))->groupBy('VENDOR')->get();

        return view('products.reports', compact('result'));

    }

    /**
     * @param  Request $request
     * @return View
     */
    public function show(Request $request)
    {
    $typeChart = $request->only('typeChart')['typeChart'];
    $reportType = $request->only('reportType')['reportType'];
        switch ($reportType) {
            case 'sellByCategory':
                $result = (new MetricsManager(new SellsByCategory()))->read($request->all());
                break;
            case 'sellByStatus':
                $result = (new MetricsManager(new SellsByStatus()))->read($request->all());
                break;
            case 'sellByProduct':
                $result = (new MetricsManager(new SellsByProduct()))->read($request->all());
                break;
            case 'stockByCategory':
                $result = (new MetricsManager(new StockByCategory()))->read($request->all());
                break;
            case 'usersStatus':
                $result = (new MetricsManager(new UsersStatus()))->read($request->all());
                break;
            case 'topClient':
                $result = (new MetricsManager(new TopClients()))->read($request->all());
                break;
            default:
                $result=null;
                break;
        }

        return view('products.reports', compact('result','typeChart'));
    }
}
