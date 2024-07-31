<?php

namespace App\Exports;

use App\Models\KartuKeluarga;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KartuKeluargaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KartuKeluarga::select('no_kk', 'nama_kk', 'alamat', 'rt', 'rw')->get();
    }

    /**
     * Return the headings for the excel file.
     * 
     * @return array
     */
    public function headings(): array
    {
        return [
            'No. KK',
            'Nama KK',
            'Alamat',
            'RT',
            'RW'
        ];
    }
}

