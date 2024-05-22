<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataInformasi extends Model
{
    use HasFactory;
    protected $table ="DataInformasi";
    protected $fillable = ['nama_kegiatan', 'deskripsi', 'pdf'];
}