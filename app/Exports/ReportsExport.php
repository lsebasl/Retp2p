<?php

namespace App\Exports;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ReportsExport implements FromCollection,WithHeadings,ShouldQueue
{
    use Exportable, Queueable, Dispatchable, InteractsWithQueue, SerializesModels;

    protected $report;
    protected $table;

    public function __construct($report,$table)
    {
        $this->report = $report;
        $this->table = $table;

    }

    public function __sleep()
    {
        return[];
    }

    public function __wakeup()
    {
    //   Storage::disk()->delete('actualTable.txt');
        return  $this->collection();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|Builder
     */
    public function collection()
    {
     //   $var=DB::select('select name from users');
      //  dd($var[0]);

        return $this->report;
    }
    /*
    public function table()
    {
        $describe='describe '.$this->table;
        $array=DB::select($describe);
        $result= array();
        foreach ($array as $elem){
            array_push($result, $elem->Field);
        };
        return  $result;
    }*/


    /**
     * @return array
     */
    public function headings(): array
    {
        return value(function() {

            $actualTable=Storage::disk()->get('actualTable.txt');

            $result= [];

            $array=DB::select('describe '.$actualTable);

            foreach ($array as $elem){
                array_push($result, $elem->Field);
            };

            return $result;

        });

    }
}
