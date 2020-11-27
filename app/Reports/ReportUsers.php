<?php

namespace App\Reports;

use App\Exports\UsersExport;
use App\User;
use Illuminate\Http\Request;

class ReportUsers implements ReportContract
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export(Request $request)
    {
        return User::status($request->get('status'))
            ->CreatedDate($request->get('initialDate'),$request->get('finalDate'))
            ->IdType($request->get('idType'))->get();

    }

}
