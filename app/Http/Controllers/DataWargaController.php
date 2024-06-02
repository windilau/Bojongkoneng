<?php

namespace App\Http\Controllers;

use App\Imports\wargaImport;
use App\Models\DataWarga;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class DataWargaController extends Controller
{
    public function index()
    {
        $datawarga = DB::table('datawarga')->join('villages', 'datawarga.desa_kelurahan', '=', 'villages.id')->join('districts', 'datawarga.kecamatan', '=', 'districts.id')->join('regencies', 'datawarga.kab_kota', '=', 'regencies.id')->join('provinces', 'datawarga.provinsi', '=', 'provinces.id')->select('datawarga.*', 'villages.name as nama_desa', 'districts.name as nama_kec', 'regencies.name as nama_kab_kota', 'provinces.name as nama_prov')->get();
        // $namaProvinsi = Province::all();
        // $namaKabupaten = Regency::all();
        // $namaKecamatan = District::all();
        // $namaDesa = Village::all();
        // return view('content.dashboard-warga', compact('datawarga', 'namaProvinsi', 'namaKabupaten', 'namaKecamatan', 'namaDesa'));
        // dd($datawarga);
        return view('content.dashboard-warga', compact('datawarga'));
    }

    public function create()
    {
        return view('content.dashboard-warga-add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => [
                'required',
                'digits:16', // Memastikan NIK tepat 16 digit
                'regex:/^[0-9]{16}$/', // Memastikan hanya angka 0-9 yang diizinkan
            ],
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:10',
            'alamat_ktp' => 'required|string|max:255',
            'alamat_domisili' => 'required|string|max:255',
            'desa_kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kab_kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.digits' => 'NIK harus terdiri dari 16 digit.',
            'nik.regex' => 'NIK hanya boleh mengandung angka.',
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',
            'alamat_ktp.required' => 'Alamat KTP wajib diisi.',
            'alamat_domisili.required' => 'Alamat domisili wajib diisi.',
            'desa_kelurahan.required' => 'Nama desa/kelurahan wajib diisi.',
            'kecamatan.required' => 'Nama kecamatan wajib diisi.',
            'kab_kota.required' => 'Nama kabupaten/kota wajib diisi.',
            'provinsi.required' => 'Nama provinsi wajib diisi.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            $errorMessage = $errors->first();

            Alert::error('Add Data Failed', $errorMessage);

            return back()->withErrors($validator)->withInput();
        }

        $input = $request->all();
        DataWarga::create($input);

        Alert::success('Data Berhasil Ditambahkan!');
        return redirect('dashboard-warga');
    }

    public function edit($id)
    {
        $datawarga = DataWarga::findOrFail($id);
        $namaProvinsi = Province::all();
        $namaKabupaten = Regency::all();
        $namaKecamatan = District::all();
        $namaDesa = Village::all();
        return view('content.dashboard-warga-edit', compact('datawarga', 'namaProvinsi', 'namaKabupaten', 'namaKecamatan', 'namaDesa'));
    }

    public function update(Request $request, $id)
    {
        $datawarga = DataWarga::findOrFail($id);
        $input = $request->all();
        $datawarga->update($input);

        $validator = Validator::make($request->all(), [
            'nik' => [
                'required',
                'digits:16', // Memastikan NIK tepat 16 digit
                'regex:/^[0-9]{16}$/', // Memastikan hanya angka 0-9 yang diizinkan
            ],
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:10',
            'alamat_ktp' => 'required|string|max:255',
            'alamat_domisili' => 'required|string|max:255',
            'desa_kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kab_kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.digits' => 'NIK harus terdiri dari 16 digit.',
            'nik.regex' => 'NIK hanya boleh mengandung angka.',
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',
            'alamat_ktp.required' => 'Alamat KTP wajib diisi.',
            'alamat_domisili.required' => 'Alamat domisili wajib diisi.',
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

        Alert::success('Data Berhasil Diupdate!');
        return redirect('dashboard-warga');
    }

    public function destroy($id)
    {
        $datawarga = DataWarga::findOrFail($id);
        $datawarga->delete();

        Alert::success('Data Berhasil Dihapus!');
        return redirect('dashboard-warga');
    }

    public function import(request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:cvs,xls,xlsx'
        ]);

        $file = $request->file('file');
        $nama_file = rand() . $file->getClientOriginalName();

        $file->move('file_user', $nama_file);


        Excel::import(new wargaImport, public_path('/file_user/' . $nama_file));

        Alert::success('Data Berhasil Diimport!');
        return redirect('dashboard-warga')->with('success', 'CSV file imported succesfully!');

        // $file = $request->file('file');
        // $fileContents = file($file->getPathname());

        // foreach ($fileContents as $line) {
        //     $data = str_getcsv($line);

        //     DataWarga::create(
        //         new wargaImport
        //     );
        // }

        // return redirect('dashboard-warga')->back()->with('success', 'CSV file imported successfully.');
    }
}
