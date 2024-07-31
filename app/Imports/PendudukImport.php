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
        $tanggalLahir = $row['tanggal lahir'];

        if (is_numeric($tanggalLahir)) {
            $tanggalLahir = Date::excelToDateTimeObject($tanggalLahir)->format('Y-m-d');
        } else {
            $tanggalLahir = date('Y-m-d', strtotime($tanggalLahir));
        }

        return new Penduduk([
            'nik' => $row['nik'],
            'nama' => $row['nama'],
            'jenis_kelamin' => $row['jenis kelamin'],
            'tempat_lahir' => $row['tempat lahir'],
            'tanggal_lahir' => $tanggalLahir,
            'pendidikan' => $row['pendidikan'],
            'pekerjaan' => $row['pekerjaan'],
            'nama_ayah' => $row['nama ayah'],
            'nama_ibu' => $row['nama ibu'],
            'no_kk' => $row['no kk'],
            'status' => $row['status'] ?? 'aktif', // Menggunakan default value 'aktif' jika status kosong
            'keterangan' => $row['keterangan'],
        ]);
    }
}
