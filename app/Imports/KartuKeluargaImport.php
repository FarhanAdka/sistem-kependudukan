<?php

namespace App\Imports;

use App\Models\KartuKeluarga;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KartuKeluargaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new KartuKeluarga([
            'no_kk' => $row['no_kk'],
            'nama_kk' => $row['nama_kk'],
            'alamat' => $row['alamat'],
            'rt' => $row['rt'],
            'rw' => $row['rw'],
            // scan_kk tidak perlu diimport karena nullable
        ]);
    }
}

