<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataWarga extends Model
{
    use HasFactory;
    protected $table = 'DataWarga';
    protected $fillable = ['nik', 'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin',
                'alamat_ktp', 'alamat_domisili', 'desa_kelurahan', 'kecamatan', 'kab_kota', 'provinsi'];
}
