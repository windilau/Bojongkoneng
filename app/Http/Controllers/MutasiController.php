<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use App\Models\Mutasi;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class MutasiController extends Controller
{
    public function index() {
        $mutasi = Mutasi::all();
        // $datawarga = DB::table('datawarga')->join('villages', 'datawarga.desa_kelurahan', '=', 'villages.id')->join('districts', 'datawarga.kecamatan', '=', 'districts.id')->join('regencies', 'datawarga.kab_kota', '=', 'regencies.id')->join('provinces', 'datawarga.provinsi', '=', 'provinces.id')->select('datawarga.*', 'villages.name as nama_desa', 'districts.name as nama_kec', 'regencies.name as nama_kab_kot', 'provinces.name as nama_prov')->get();
        $namaProvinsi = Province::all();
        $namaKabupaten = Regency::all();
        $namaKecamatan = District::all();
        $namaDesa = Village::all();
        return view('content.dashboard-mutasi', compact('mutasi', 'namaProvinsi', 'namaKabupaten', 'namaKecamatan', 'namaDesa'));
    }

    public function create() {
        return view('content.dashboard-mutasi-add');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:255',
            'no_kk' => [
                'required',
                'digits:16', // Memastikan NIK tepat 16 digit
                'regex:/^[0-9]{16}$/', // Memastikan hanya angka 0-9 yang diizinkan
            ],
            'nik' => [
                'required',
                'digits:16', // Memastikan NIK tepat 16 digit
                'regex:/^[0-9]{16}$/', // Memastikan hanya angka 0-9 yang diizinkan
            ],
            'jenis_kelamin' => 'required|string|max:10',
            'alamat_sebelum' => 'required|string|max:255',
            'desa_sebelum' => 'required|string|max:255',
            'kec_sebelum' => 'required|string|max:255',
            'kab_sebelum' => 'required|string|max:255',
            'prov_sebelum' => 'required|string|max:255',
            'alamat_sesudah' => 'required|string|max:255',
            'desa_sesudah' => 'required|string|max:255',
            'kec_sesudah' => 'required|string|max:255',
            'kab_sesudah' => 'required|string|max:255',
            'prov_sesudah' => 'required|string|max:255',
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'no_kk.required' => 'No KK wajib diisi.',
            'no_kk.digits' => 'No KK harus terdiri dari 16 digit.',
            'no_kk.regex' => 'No KK hanya boleh mengandung angka.',
            'nik.required' => 'NIK wajib diisi.',
            'nik.digits' => 'NIK harus terdiri dari 16 digit.',
            'nik.regex' => 'NIK hanya boleh mengandung angka.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',
            'alamat_sebelum.required' => 'Alamat Sebelum wajib diisi.',
            'desa_sebelum.required' => 'Nama desa/kelurahan wajib diisi.',
            'kec_sebelum.required' => 'Nama kecamatan sebelum wajib diisi.',
            'kab_sebelum.required' => 'Nama kabupaten/kota sebelum wajib diisi.',
            'prov_sebelum.required' => 'Nama provinsi sebelum sebelum wajib diisi.',
            'alamat_sesudah.required' => 'Alamat Sesudah wajib diisi.',
            'desa_sesudah.required' => 'Nama desa/kelurahan sesudah wajib diisi.',
            'kec_sesudah.required' => 'Nama kecamatan wajib sesudah diisi.',
            'kab_sesudah.required' => 'Nama kabupaten/kota sesudah wajib diisi.',
            'prov_sesudah.required' => 'Nama provinsi sesudah wajib diisi.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            $errorMessage = $errors->first();

            Alert::error('Failed Update', $errorMessage);

            return back()->withErrors($validator)->withInput();
        }

        $input = $request->all();
        Mutasi::create($input);

        Alert::success('Data Berhasil Ditambahkan!');
        return redirect('dashboard-mutasi');
    }

    public function edit($id) {
        $mutasi = mutasi::findOrFail($id);
        $namaProvinsi = Province::all();
        $namaKabupaten = Regency::all();
        $namaKecamatan = District::all();
        $namaDesa = Village::all();
        return view('content.dashboard-mutasi-edit', compact('mutasi', 'namaProvinsi', 'namaKabupaten', 'namaKecamatan', 'namaDesa'));
    }

    public function update(Request $request, $id) 
    {
        $validator = Validator::make($request->all(), [
            'no_kk' => [
                'required',
                'digits:16', // Memastikan NIK tepat 16 digit
                'regex:/^[0-9]{16}$/', // Memastikan hanya angka 0-9 yang diizinkan
            ],
            'nik' => [
                'required',
                'digits:16', // Memastikan NIK tepat 16 digit
                'regex:/^[0-9]{16}$/', // Memastikan hanya angka 0-9 yang diizinkan
            ],
        ], [
            'no_kk.required' => 'No KK wajib diisi.',
            'no_kk.digits' => 'No KK harus terdiri dari 16 digit.',
            'no_kk.regex' => 'No KK hanya boleh mengandung angka.',
            'nik.required' => 'NIK wajib diisi.',
            'nik.digits' => 'NIK harus terdiri dari 16 digit.',
            'nik.regex' => 'NIK hanya boleh mengandung angka.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            $errorMessage = $errors->first();

            Alert::error('Failed Update', $errorMessage);

            return back()->withErrors($validator)->withInput();
        }

        $mutasi = mutasi::findOrFail($id);
        $input = $request->all();
        $mutasi->update($input);

        Alert::success('Data Berhasil Diupdate!');
        return redirect('dashboard-mutasi');
    }

    public function destroy($id) {
        $mutasi = mutasi::findOrFail($id);
        $mutasi->delete();

        Alert::success('Data Berhasil Dihapus!');
        return redirect('dashboard-mutasi');
    }
}