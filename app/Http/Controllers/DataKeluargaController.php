<?php

namespace App\Http\Controllers;

use App\Models\dataKeluarga;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class dataKeluargaController extends Controller
{
    public function index()
    {
        $dataKeluarga = DB::table('datakeluarga')->join('villages', 'datakeluarga.desa_kelurahan', '=', 'villages.id')->join('districts', 'datakeluarga.kecamatan', '=', 'districts.id')->join('regencies', 'datakeluarga.kab_kota', '=', 'regencies.id')->join('provinces', 'datakeluarga.provinsi', '=', 'provinces.id')->select('datakeluarga.*', 'villages.name as nama_desa', 'districts.name as nama_kec', 'regencies.name as nama_kab_kota', 'provinces.name as nama_prov')->get();
        // $namaProvinsi = Province::all();
        // $namaKabupaten = Regency::all();
        // $namaKecamatan = District::all();
        // $namaDesa = Village::all();
        return view('content.dashboard-data-keluarga', compact('dataKeluarga'));
    }

    public function create()
    {
        return view('content.dashboard-data-keluarga-add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_kk' => [
                'required',
                'digits:16', // Memastikan NIK tepat 16 digit
                'regex:/^[0-9]{16}$/', // Memastikan hanya angka 0-9 yang diizinkan
            ],
            'nik_kepala_keluarga' => [
                'required',
                'digits:16', // Memastikan NIK tepat 16 digit
                'regex:/^[0-9]{16}$/', // Memastikan hanya angka 0-9 yang diizinkan
            ],
            'alamat' => 'required|string|max:255',
            'desa_kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kab_kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
        ], [
            'no_kk.required' => 'No KK wajib diisi.',
            'no_kk.digits' => 'No KK harus terdiri dari 16 digit.',
            'no_kk.regex' => 'No KK hanya boleh mengandung angka.',
            'nik_kepala_keluarga.required' => 'NIK wajib diisi.',
            'nik_kepala_keluarga.digits' => 'NIK harus terdiri dari 16 digit.',
            'nik_kepala_keluarga.regex' => 'NIK hanya boleh mengandung angka.',
            'alamat.required' => 'Alamat wajib diisi.',
            'desa_kelurahan.required' => 'Nama desa/kelurahan wajib diisi.',
            'kecamatan.required' => 'Nama kecamatan wajib diisi.',
            'kab_kota.required' => 'Nama kabupaten/kota wajib diisi.',
            'provinsi.required' => 'Nama provinsi wajib diisi.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            $errorMessage = $errors->first();

            Alert::error('Failed Update', $errorMessage);

            return back()->withErrors($validator)->withInput();
        }

        $input = $request->all();
        dataKeluarga::create($input);

        Alert::success('Data Berhasil Ditambahkan!');
        return redirect('dashboard-data-keluarga');
    }

    public function edit($id)
    {
        $dataKeluarga = dataKeluarga::findOrFail($id);
        $namaProvinsi = Province::all();
        $namaKabupaten = Regency::all();
        $namaKecamatan = District::all();
        $namaDesa = Village::all();
        return view('content.dashboard-data-keluarga-edit', compact('dataKeluarga', 'namaProvinsi', 'namaKabupaten', 'namaKecamatan', 'namaDesa'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'no_kk' => [
                'required',
                'digits:16', // Memastikan NIK tepat 16 digit
                'regex:/^[0-9]{16}$/', // Memastikan hanya angka 0-9 yang diizinkan
            ],
            'nik_kepala_keluarga' => [
                'required',
                'digits:16', // Memastikan NIK tepat 16 digit
                'regex:/^[0-9]{16}$/', // Memastikan hanya angka 0-9 yang diizinkan
            ],
        ], [
            'no_kk.required' => 'No KK wajib diisi.',
            'no_kk.digits' => 'No KK harus terdiri dari 16 digit.',
            'no_kk.regex' => 'No KK hanya boleh mengandung angka.',
            'nik_kepala_keluarga.required' => 'NIK wajib diisi.',
            'nik_kepala_keluarga.digits' => 'NIK harus terdiri dari 16 digit.',
            'nik_kepala_keluarga.regex' => 'NIK hanya boleh mengandung angka.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            $errorMessage = $errors->first();

            Alert::error('Failed Update', $errorMessage);

            return back()->withErrors($validator)->withInput();
        }

        $dataKeluarga = dataKeluarga::findOrFail($id);
        $input = $request->all();
        $dataKeluarga -> update($input);

        Alert::success('Data Berhasil Diupdate!');
        return redirect('dashboard-data-keluarga');
    }


    public function destroy($id)
    {
        $dataKeluarga = dataKeluarga::findOrFail($id);
        $dataKeluarga->delete();

        Alert::success('Data Berhasil Dihapus!');
        return redirect('dashboard-data-keluarga');
    }

}