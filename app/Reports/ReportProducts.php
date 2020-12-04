<?php

namespace App\Reports;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ReportProducts implements ReportContract
{
    /**
     * @param Request $request
     * @return Response|mixed|BinaryFileResponse
     */
    public function export(Request $request)
    {
        return Product::status($request->get('status'))
            ->createdDate($request->get('initialDate'), $request->get('finalDate'))
            ->mark($request->get('mark'))
            ->category($request->get('category'))->get();
    }
}
