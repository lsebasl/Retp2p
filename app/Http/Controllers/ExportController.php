<?php

namespace App\Http\Controllers;

use App\Exports\ReportsExport;
use App\Reports\ReportManager;
use App\Reports\ReportProducts;
use Illuminate\Http\Request;

class ExportController extends Controller
{


    public function export(Request $request)
    {

        $exportType = $request->input('exportType');

        $report = config('reports.' . $exportType) ?? abort(404);

        $export = (new ReportManager(new $report()))->export($request);

        return (new ReportsExport($export))->download('report.xlsx');


    }
}
