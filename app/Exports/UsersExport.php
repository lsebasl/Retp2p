<?php

namespace App\Exports;

use App\User;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromQuery,WithHeadings
{
    use Exportable;


    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|Builder
     */
    public function query()
    {
        return $this->user;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Last Name',
            'Id Type',
            'Identification',
            'Phone',
            'Address',
            'Email',
            'Status',
        ];
    }
}
