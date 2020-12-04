<?php

namespace App\Http\Controllers;

use App\Exports\ReportsExport;
use App\Http\Requests\ReportRequest;
use App\Jobs\NotifyUserOfCompletedExport;
use App\Reports\ReportManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ExportController extends Controller
{
    public function export(ReportRequest $request)
    {
        $exportType = $request->input('exportType');

        $report = config('reports.' . $exportType) ?? abort(404);

        Storage::disk()->put('actualTable.txt', config('reports.' .$exportType)['table']);

        $export = (new ReportManager(new $report['behaviour']))->export($request);

        $filePath = asset('storage/'.$exportType.'.xlsx');

        (new ReportsExport($export, $report['table']))->store($exportType.'.xlsx')
            ->chain([new NotifyUserOfCompletedExport($filePath, auth()->user())]);

        return back()->with('success', 'Report Has Been Downloaded Wait Notification In Your E-mail!');
    }
}
