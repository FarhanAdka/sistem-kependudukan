<?php

namespace App\Exports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendudukExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Penduduk::select(
            'nik',
            'nama',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'pendidikan',
            'pekerjaan',
            'nama_ayah',
            'nama_ibu',
            'no_kk',
            'status',
            'keterangan'
        )->get();
    }

    /**
     * Return the headings for the excel file.
     * 
     * @return array
     */
    public function headings(): array
    {
        return [
            'NIK',
            'Nama',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Pendidikan',
            'Pekerjaan',
            'Nama Ayah',
            'Nama Ibu',
            'No. KK',
            'Status',
            'Keterangan'
        ];
    }
}