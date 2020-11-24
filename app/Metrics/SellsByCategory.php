<?php

namespace App\Metrics;

use App\Invoice;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SellsByCategory implements MetricsContract
{
    /**
     * @param  array $filters
     * @return array
     */
    public function read(array $filters)
    {
        // $result = DB::table('invoices_product')->select(DB::raw("users_id as VENDOR, sum(total_by_product) as SALES"))->groupBy('VENDOR')->get();

        $sellsByCategory = DB::table('invoices')
            ->join('invoice_product', 'invoices.id', '=', 'invoice_product.invoice_id')
            ->join('products', 'invoice_product.product_id', '=', 'products.id')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->whereBetween(
                'invoices.created_at',
                [$filters['initialDate'],
                $filters['finalDate']]
            )
            ->where('invoices.status','Paid')
            ->select(DB::raw("categories.name as DATA,  sum(total_by_product) as LABEL"))->groupBy('category_id')->get();

        return $sellsByCategory;

        /* select title, tag
        from books
        join books_tags on books.id = books_tags.books_id
        join tags on books_tags.tags_id = tags.id;*/




        //SELECT products.category_id AS CATEGORIA, SUM(invoices.total) AS VENTASXCAT FROM INVOICES,INVOICE_PRODUCT,PRODUCTS WHERE INVOICES.ID=INVOICE_PRODUCT.invoice_id AND INVOICE_PRODUCT.PRODUCT_ID=PRODUCTS.ID
        //GROUP BY CATEGORIA;

        /*
        $initialDate = Carbon::parse($filters['initialDate']);

        $finalDate = Carbon::parse($filters['finalDate']);

        $differenceDays = ($finalDate->diffInDays($initialDate))+ 1;

        $days = $differenceDays/6;

        $data1 = [];
        $data2 = [];
        $data3 = [];
        $data4 = [];

        $invoices =  Invoice::with('products')->whereBetween('created_at', [
            $filters['initialDate'] ,
            $filters['finalDate'] ,
        ])->where('status','Paid')->get();

        $original = $invoices->map(function ($item)use($data1,$data2,$data3,$data4){
            foreach($item->products as $product){
                if($product->category_id === 1){
                    $totalPrice1 = null;

                    $totalPrice1 = $totalPrice1 + $product->price;

                    $totalPrice1 = $total = 0 + $totalPrice1;

                    array_push($data1,$totalPrice1);
                }
                if($product->category_id === 2){
                    $totalPrice2 = null;

                    $totalPrice2 = $totalPrice2 + $product->price;

                    array_push($data2,$totalPrice2);
                }
                if($product->category_id === 3){
                    $totalPrice3 = null;

                    $totalPrice3 = $totalPrice3 + $product->price;
                    array_push($data3,$totalPrice3);
                }
                if($product->category_id === 4){
                    $totalPrice4 = null;

                    $totalPrice4 = $totalPrice4 + $product->price;
                    array_push($data4,$totalPrice4);
                }

            }

            return array_merge([array_sum($data1),array_sum($data2),array_sum($data3),array_sum($data4)]);

        });

        $labels = ['Mobiles', 'Computers','Tv & Video','Accessories'];

        return $original->all();
        */
    }
}
