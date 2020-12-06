<?php

namespace App\Reports;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

;

class ReportProducts implements ReportContract
{

    /**
     * Create a product collection to export using category,mark and date filters.
     *
     * @param Request $request
     * @return Collection
     */
    public function export(Request $request):Collection
    {
        return Product::status($request->get('status'))
            ->createdDate($request->get('initialDate'), $request->get('finalDate'))
            ->mark($request->get('mark'))
            ->category($request->get('category'))->get();
    }
}
