<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataKeluarga extends Model
{
    use HasFactory;
    protected $table= "DataKeluarga";
    protected $fillable = ['no_KK','Id_KK','Alamat','desa_lurah','kecamatan','kab_kota','prov','negara'];
}