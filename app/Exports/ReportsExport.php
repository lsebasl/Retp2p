<?php

namespace App\Exports;

use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportsExport implements FromCollection,WithHeadings
{
    use Exportable;

    private $report;

    public function __construct($report)
    {

        $this->report = $report;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|Builder
     */
    public function collection()
    {
        return $this->report;
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
}
