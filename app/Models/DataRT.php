<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRT extends Model
{
    use HasFactory;
    protected $table= "dataketuart";
    protected $fillable = ['nama_rt','notelp_rt','alamat_rt','image'];
}