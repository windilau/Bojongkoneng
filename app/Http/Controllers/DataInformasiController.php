<?php

namespace App\Http\Controllers;
use App\Models\DataInformasi;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DataInformasiController extends Controller
{
    public function home()
    {
        $datainformasi = DataInformasi::all();
        return view('bokoin.content.landingPage', compact('datainformasi'));
    }
    public function index()
    {
        $datainformasi = DataInformasi::all();
        return view('Content.dashboard-informasi', compact('datainformasi'));
    }

    public function create()
    {
        return view('Content.dashboard-informasi-add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'pdf' => 'required|file|mimes:pdf,jpg,jpeg,png|max:6144', // maksimal ukuran file 6MB (6144 KB)
        ], [
            'nama_kegiatan.required' => 'Nama Kegiatan wajib diisi.',
            'deskripsi.required' => 'Deskripsi Kegiatan wajib diisi.',
            'pdf.required' => 'File Informasi wajib diisi.',
            'pdf.file' => 'File Informasi harus berupa file.',
            'pdf.mimes' => 'File Informasi harus berupa file dengan tipe: pdf, jpg, jpeg, png.',
            'pdf.max' => 'File Informasi tidak boleh lebih dari 6MB.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            $errorMessage = $errors->first();

            Alert::error('Failed Update', $errorMessage);

            return back()->withErrors($validator)->withInput();
        }
        
        $input = $request->all();

        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = $file->move(public_path('pdf'), $filename);
            $input['pdf'] = $filename;
        }

        DataInformasi::create($input);

        Alert::success('Data Berhasil Ditambahkan!');
        return redirect('dashboard-informasi');
    }

    public function edit($id)
    {
        $datainformasi = DataInformasi::findOrFail($id);
        return view('content.dashboard-informasi-edit', compact('datainformasi'));
    }

    public function update(Request $request, $id)
    {
        $datainformasi = DataInformasi::findOrFail($id);
        $input = $request->all();

        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = $file->move(public_path('pdf'), $filename);
            $input['pdf'] = $filename;
        }

        $datainformasi->update($input);

        Alert::success('Data Berhasil Diupdate!');
        return redirect('dashboard-informasi');
    }

    public function destroy($id)
    {
        $datainformasi = DataInformasi::findOrFail($id);
        if ($datainformasi->pdf) {
            Storage::delete('public/pdf' . $datainformasi->pdf);
        }
        $datainformasi->delete();

        Alert::success('Data Berhasil Dihapus!');
        return redirect('dashboard-informasi');
    }

}