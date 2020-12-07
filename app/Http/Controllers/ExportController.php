<?php

namespace App\Http\Controllers;

use App\Events\GeneralLogEvent;
use App\Exports\ReportsExport;
use App\Helpers\Logs;
use App\Http\Requests\ReportRequest;
use App\Jobs\NotifyUserOfCompletedExport;
use App\Reports\ReportManager;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ExportController extends Controller
{
    /**
     * Exports excel products depending of a specific behaviour.
     *
     * @param  ReportRequest $request
     * @return RedirectResponse
     */
    public function export(ReportRequest $request):RedirectResponse
    {
        $exportType = $request->input('exportType');

        $report = config('reports.' . $exportType) ?? abort(404);

        Storage::disk()->put('actualTable.txt', config('reports.' .$exportType)['table']);

        try {
            $export = (new ReportManager(new $report['behaviour']))->export($request);

            $filePath = asset('storage/'.$exportType.'.xlsx');

            (new ReportsExport($export, $report['table']))->store($exportType.'.xlsx')
                ->chain([new NotifyUserOfCompletedExport($filePath, auth()->user())]);

            return back()->with('success', 'Report Has Been Downloaded Wait Notification In Your E-mail!');
        } catch (Exception $e) {
            $message = 'download report'. " " . $e->getMessage();

            $options=[
                'exportType' => $exportType,
                'user' => auth()->user()->id,
            ];

            Logs::errorLogger($message, $options);

            return back()->with('error', 'Report Has not Been Downloaded');
        }
    }
}
