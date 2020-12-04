<?php

namespace App\Reports;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface ReportContract
{
    /**
     * @param  Request $request
     * @return mixed
     */
    public function export(Request $request);
}
