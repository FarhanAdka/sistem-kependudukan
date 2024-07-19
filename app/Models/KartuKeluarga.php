<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    protected $table='kartu_keluarga';
    protected $fillable=[
        'no_kk',
        'nama_kk',
        'alamat',
        'rt',
        'rw',
        'scan_kk'
    ];
    public function penduduk()
    {
        return $this->hasMany(Penduduk::class, 'no_kk', 'no_kk'); // Relasi one-to-many dengan Penduduk
    }

    use HasFactory;
}
