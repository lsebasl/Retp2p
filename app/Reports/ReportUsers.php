<?php

namespace App\Reports;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ReportUsers implements ReportContract
{
    /**
     * @param  Request $request
     * @return Collection
     */
    public function export(Request $request):Collection
    {
        return User::status($request->get('status'))
            ->CreatedDate($request->get('initialDate'), $request->get('finalDate'))
            ->IdType($request->get('idType'))->get();
    }
}
