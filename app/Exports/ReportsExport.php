<?php

namespace App\Exports;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportsExport implements FromCollection, WithHeadings, ShouldQueue
{
    use Exportable, Queueable, Dispatchable, InteractsWithQueue, SerializesModels;

    protected $report;
    protected $table;

    public function __construct($report, $table)
    {
        $this->report = $report;
        $this->table = $table;
    }

    /**
     * Confirming pending data behind serialize.
     *
     * @return array
     */
    public function __sleep():array
    {
        return[];
    }

    /**
     * reestablish database connections that may have been lost during serialization
     *
     * @return \Illuminate\Support\Collection
     */
    public function __wakeup()
    {
        return  $this->collection();
    }

    /**
     *Return a collection to export.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->report;
    }


    /**
     * Create heading in the table exported.
     *
     * @return array
     * @throws FileNotFoundException
     */
    public function headings(): array
    {
        return value(
            function () {
                $actualTable=Storage::disk()->get('actualTable.txt');

                $result= [];

                $array=DB::select('describe '.$actualTable);

                foreach ($array as $elem) {
                    array_push($result, $elem->Field);
                }

                return $result;
            }
        );
    }
}
