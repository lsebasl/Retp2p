<?php

namespace App\Reports;

use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ReportSells implements ReportContract
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Response|mixed|BinaryFileResponse
     */
    public function export(Request $request)
    {
        $invoices = Invoice::CreatedDate($request->get('initialDate'), $request->get('finalDate'))
            ->status($request->get('status'))->get();
        return $invoices;

        /*$ventas = DB::table('invoices')
            ->join('invoice_product', 'invoices.id', '=', 'invoice_product.invoice_id')
            ->join('products', 'invoice_product.product_id', '=', 'products.id')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->whereBetween(
                'invoices.created_at',
                [$request->get('initialDate'),
                $request->get('finalDate')]
            )
            ->where('invoices.status',$request->get('status'))
            ->where('products.category_id',$request->get('category'))
            ->get();

        dd($ventas);*/
    }
}
