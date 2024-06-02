<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;


class IndoRegionController extends Controller
{
    public function formWarga()
    {
        // Get semua data
        $provinces = Province::all();

        return view('content.dashboard-warga-add', compact('provinces'));
    }

    public function formKeluarga()
    {
        // Get semua data
        $provinces = Province::all();

        return view('content.dashboard-data-keluarga-add', compact('provinces'));
    }

    public function formMutasi()
    {
        // Get semua data
        $provinces = Province::all();

        return view('content.dashboard-mutasi-add', compact('provinces'));
    }
    
    public function getKabupaten(request $request)
    {
        $id_provinsi = $request->id_provinsi;

        $kabupatens = Regency::where('province_id', $id_provinsi)->get();

        $option = "<option > Pilih Kabupaten/Kota...</option>";
        foreach($kabupatens as $kabupaten){
            $option.= "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }

        echo $option;
    }

    public function getKecamatan(request $request)
    {
        $id_kabupaten = $request->id_kabupaten;

        $kecamatans = District::where('regency_id', $id_kabupaten)->get();

        $option = "<option > Pilih Kecamatan...</option>";
        foreach($kecamatans as $kecamatan){
            $option.= "<option value='$kecamatan->id'>$kecamatan->name</option>";
        }
        
        echo $option;
    }

    public function getDesa(request $request)
    {
        $id_kecamatan = $request->id_kecamatan;

        $desas = Village::where('district_id', $id_kecamatan)->get();

        $option = "<option > Pilih Desa/Kelurahan...</option>";
        foreach($desas as $desa){
            $option.= "<option value='$desa->id'>$desa->name</option>";
        }

        echo $option;
    }
}
