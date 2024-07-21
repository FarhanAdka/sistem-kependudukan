<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table='penduduk';
    protected $fillable=[
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
    ];
    public function kartuKeluarga()
    {
        return $this->belongsTo(KartuKeluarga::class, 'no_kk'); // Relasi many-to-one dengan KartuKeluarga
    }

    use HasFactory;
}
