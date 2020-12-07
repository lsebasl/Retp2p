<?php

namespace App\Reports;

use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ReportSells implements ReportContract
{

    /**
     * Create as sells collection to export using date and invoices status filters.
     *
     * @param  Request $request
     * @return Collection
     */
    public function export(Request $request):Collection
    {
        return  Invoice::createdDate($request->get('initialDate'), $request->get('finalDate'))
            ->status($request->get('status'))->get();
    }
}
