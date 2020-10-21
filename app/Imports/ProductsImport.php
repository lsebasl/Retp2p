<?php

namespace App\Imports;

use App\Product;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return Product|null
     */
    public function model(array $row)
    {
        return new Product([
            'image'       => $row[1],
            'barcode'     => $row[2],
            'name'        => $row[3],
            'model'       => $row[4],
            'mark'        => $row[5],
            'description' => $row[6],
            'units'       => $row[7],
            'price'       => $row[8],
            'discount'    => $row[9],
            'status'      => $row[10],
            'created_at'  => $row[11],
            'updated_at'  => $row[12],
            'created_by'  => $row[13],
            'updated_by'  => $row[14],
            'category_id' => $row[15 ],

        ]);
    }
}
