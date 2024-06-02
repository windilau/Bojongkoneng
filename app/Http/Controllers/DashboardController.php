<?php

namespace App\Http\Controllers;


use App\Models\DataInformasi;
use App\Models\DataRT;
use App\Models\DataWarga;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function chart()
    {
        $laki = 0;
        $perempuan = 0;
        $perempuan =  DB::table('datawarga')->where('jenis_kelamin', 'Perempuan')->count();
        $laki =  DataWarga::where('jenis_kelamin', 'Laki-Laki')->count();

        $datainformasi = DataInformasi::all();
        $rt = dataRT::all();
        $countwarga = DB::table('datawarga')->count();
        $countkepalakeluarga = DB::table('datakeluarga')->count();
        $countmutasi = DB::table('mutasi')->count();
        $countinfo = DB::table('datainformasi')->count();
        $countkartukeluarga = DB::table('datakeluarga')->count();

        $datawarga = DataWarga::all();

        $jumlahBalita = 0; // 0 - 5 thn
        $jumlahAnakAnak = 0; // 6 - 11 thn
        $jumlahRemajaAwal = 0; // 12 - 16 thn
        $jumlahRemajaAkhir = 0; // 17 - 25 thn
        $jumlahDewasa = 0; // 26 - 45 thn
        $jumlahLansia = 0; // 46 - 65 thn
        $jumlahManula = 0; // 66+ thn

        foreach ($datawarga as $warga) {
            $tanggal_lahir = new DateTime($warga->tanggal_lahir);
            $today = new DateTime();
            $usia = $today->diff($tanggal_lahir)->y; // Menghitung selisih tahun antara tanggal lahir dan hari ini

            if ($usia >= 0 && $usia <= 5) {
                $jumlahBalita++;
            } elseif ($usia >= 6 && $usia <= 11) {
                $jumlahAnakAnak++;
            } elseif ($usia >= 12 && $usia <= 16) {
                $jumlahRemajaAwal++;
            } elseif ($usia >= 17 && $usia <= 25) {
                $jumlahRemajaAkhir++;
            } elseif ($usia >= 26 && $usia <= 45) {
                $jumlahDewasa++;
            } elseif ($usia >= 46 && $usia <= 65) {
                $jumlahLansia++;
            } else {
                $jumlahManula++;
            }
        }

        $chartUsia = "[$jumlahBalita,$jumlahAnakAnak,$jumlahRemajaAwal,$jumlahRemajaAkhir,$jumlahDewasa,$jumlahLansia,$jumlahManula]";

        return view(
            'content.dashboard',
            compact(
                'datawarga',
                'perempuan',
                'laki',
                'datainformasi',
                'rt',
                'countwarga',
                'countkepalakeluarga',
                'countmutasi',
                'countinfo',
                'countkartukeluarga',
                'chartUsia',
            )
        );
    }
}
