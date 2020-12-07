<?php

namespace App\Reports;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface ReportContract
{
    /**
     * Interface to implement export method in report manager.
     *
     * @param  Request $request
     * @return mixed
     */
    public function export(Request $request):Collection;
}
