<?php

namespace App\Reports;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ReportManager implements ReportContract
{
    /**
     * @var ReportManager
     */
    private $excelReport;

    /**
     * Metric constructor.
     *
     * @param ReportContract $excelReport
     */
    public function __construct(ReportContract $excelReport)
    {
        $this->excelReport = $excelReport;
    }


    /**
     * Export collection depends of a report type.
     *
     * @param  Request $request
     * @return Collection
     */
    public function export(Request $request):Collection
    {
        return $this->excelReport->export($request);
    }
}
