<?php

namespace App\Reports;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
     * @param  Request $request
     * @return Model|mixed
     */
    public function export(Request $request)
    {
        return $this->excelReport->export($request);
    }
}
