<?php

namespace App\Imports;

use App\Models\Penduduk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use \PhpOffice\PhpSpreadsheet\Shared\Date;

class PendudukImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $tanggalLahir = $row['tanggal_lahir'];

        if (is_numeric($tanggalLahir)) {
            $tanggalLahir = Date::excelToDateTimeObject($tanggalLahir)->format('Y-m-d');
        } else {
            $tanggalLahir = date('Y-m-d', strtotime($tanggalLahir));
        }

        return new Penduduk([
            'nik' => $row['nik'],
            'nama' => $row['nama'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $tanggalLahir,
            'pendidikan' => $row['pendidikan'],
            'pekerjaan' => $row['pekerjaan'],
            'nama_ayah' => $row['nama_ayah'],
            'nama_ibu' => $row['nama_ibu'],
            'no_kk' => $row['no_kk'],
            'status' => $row['status'] ?? 'aktif', // Menggunakan default value 'aktif' jika status kosong
            'keterangan' => $row['keterangan'],
        ]);
    }
}
