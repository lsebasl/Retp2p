<?php

namespace App\Exports;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
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

    /**
     * Confirm pending data to serialized.
     *
     * @return array
     */
    public function __sleep():array
    {
        return[];
    }

    /**
     *Re-establish database connections that may have been lost during serialization.
     *
     * @return Collection
     */
    public function __wakeup():Collection
    {
        return  $this->collection();
    }


    /**
     * Return collection to export.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection():Collection
    {
        return $this->report;
    }


    /**
     * Create arrays depending of the model to export.
     *
     * @return array
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
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
