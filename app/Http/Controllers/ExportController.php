<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{

    public function export()
    {
        return Excel::download(new ProductsExport(), 'products.xlsx');
    }
}
