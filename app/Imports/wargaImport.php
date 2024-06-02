<?php

namespace App\Imports;

use App\Models\DataWarga;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class wargaImport implements ToModel
{

    //   @param array $row

    //   @return User|null

    public function model(array $row)
    {
        return new DataWarga([
            // 'nik'     => $row['nik'],
            // 'nama_lengkap'    => $row['nama_lengkap'],
            // 'tempat_lahir' => $row['tempat_lahir '],
            // 'tanggal_lahir' => date('Y-m-d', strtotime($row['tanggal_lahir'])),
            // 'jenis_kelamin' => $row['jenis_kelamin'],
            // 'alamat_domisili' => $row['alamat_domisili'],
            // 'alamat_ktp' => $row['alamat_ktp'],
            // 'desa_kelurahan' => $row['desa_kelurahan'],
            // 'kecamatan' => $row['kecamatan'],
            // 'kab_kota' => $row['kab_kota'],
            // 'provinsi' => $row['provinsi'],

            'nik'     => $row[0],
            'nama_lengkap'    => $row[1],
            'tempat_lahir' => $row[2],
            'tanggal_lahir' => date('Y-m-d', strtotime($row[3])),
            'jenis_kelamin' => $row[4],
            'alamat_domisili' => $row[5],
            'alamat_ktp' => $row[6],
            'desa_kelurahan' => $row[7],
            'kecamatan' => $row[8],
            'kab_kota' => $row[9],
            'provinsi' => $row[10],


        ]);
    }
}
