<?php

namespace App\Imports;

use App\Product;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToModel, WithHeadingRow,WithValidation,WithBatchInserts
{
    /**
     * @param array $row
     *
     * @return Product|null
     */
    public function model(array $row):Product
    {

        return new Product([
            'image' => $row['image'],
            'barcode' => $row['barcode'],
            'name' => $row['name'],
            'model' => $row['model'],
            'mark' => $row['mark'],
            'description' => $row['description'],
            'units' => $row['units'],
            'price' => $row['price'],
            'discount' => $row['discount'],
            'status' => $row['status'],
            'created_at'  => $row['created_at'],
            'updated_at'  => $row['updated_at'],
            'created_by'  => $row['created_by'],
            'updated_by'  => $row['updated_by'],
            'category_id' => $row['category_id'],

        ]);
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function rules(): array
    {
        return [
            'image' =>'required',
            'barcode' => ['required', 'min:3','max:30',],
            'name' => 'required|min:3|max:30',
            'category_id' => 'required|in:1,2,3,4|int',
            'model' => 'required|min:2|max:30',
            'mark' => 'required|min:2|max:30',
            'description' => 'required|min:3|max:50',
            'units' => 'required|Integer|min:1|max:10000000',
            'price' => 'required|numeric|min:0|max:100000000',
            'discount' => 'required|numeric|min:0|max:100',
            'status' => 'required|in:Enable,Disable',

        ];
    }

}
