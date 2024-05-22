<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;
    protected $table = "Mutasi";
    protected $fillable = ['nama_lengkap', 'no_kk', 'nik', 'jenis_kelamin', 'alamat_sebelum', 'desa_sebelum', 'kec_sebelum',
                            'kab_sebelum', 'prov_sebelum', 'alamat_sesudah', 'desa_sesudah', 'kec_sesudah',
                            'kab_sesudah', 'prov_sesudah'];
}