<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataKeluarga extends Model
{
    use HasFactory;
    protected $table= "DataKeluarga";
    protected $fillable = ['no_kk','nik_kepala_keluarga','alamat','desa_kelurahan','kecamatan','kab_kota','provinsi'];
}