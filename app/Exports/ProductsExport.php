<?php

namespace App\Exports;


use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;



class ProductsExport implements FromQuery, WithHeadings,WithColumnFormatting
{
    use Exportable, InteractsWithQueue, Queueable;

    private $products;

    public function __construct($products)
    {
        $this->products = $products;
    }

    public function query()
    {
        return $this->products;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Id',
            'Image',
            'Barcode',
            'Name',
            'Model',
            'Mark',
            'Description',
            'Units',
            'Price',
            'Discount',
            'Status',
            'Created at',
            'Updated at',
            'Created by',
            'Updated by',
            'Category Id'

        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_NUMBER,
            'C' => NumberFormat::FORMAT_NUMBER,
            'I' => NumberFormat::FORMAT_CURRENCY_USD,
            'J' => NumberFormat::FORMAT_PERCENTAGE,
            'L' => NumberFormat::FORMAT_DATE_YYYYMMDD2,
            'M' => NumberFormat::FORMAT_DATE_YYYYMMDD2,

        ];
    }


}
