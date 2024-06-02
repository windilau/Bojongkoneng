<?php

namespace App\Http\Controllers;

use App\Models\DataRT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DataRTController extends Controller
{

    public function home()
    {
        $rt = dataRT::all();
        return view('bokoin.content.landingPage', compact('rt'));
    }

    public function index()
    {
        $rt = dataRT::all();
        return view('content.dashboard-data-rt', compact('rt'));
    }

    public function create()
    {
        return view('content.dashboard-data-rt-add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_rt' => 'required|string|max:255',
            'notelp_rt' => [
                'required',
                'regex:/^[0-9]{10,12}$/',
            ],
            'alamat_rt' => 'required|string|max:255',
            'image' => 'required|file|mimes:jpg,jpeg,png|max:6144',
        ], [
            'nama_rt.required' => 'Nama lengkap RT wajib diisi.',
            'notelp_rt.required' => 'Nomor telepon wajib diisi.',
            'notelp_rt.regex' => 'Nomor telepon harus terdiri dari 10 hingga 12 digit angka tanpa simbol.',
            'alamat_rt.required' => 'Alamat KTP wajib diisi.',
            'image.required' => 'Image wajib diisi.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            $errorMessage = $errors->first();

            Alert::error('Add Data Failed', $errorMessage);

            return back()->withErrors($validator)->withInput();
        }

        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = $file->move(public_path('image'), $filename);
            $input['image'] = $filename;
        }
        dataRT::create($input);

        Alert::success('Data Berhasil Ditambahkan!');
        return redirect('dashboard-data-rt');
    }

    public function edit($id)
    {
        $rt = dataRT::findOrFail($id);
        return view('content.dashboard-data-rt-edit', compact('rt'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_rt' => 'required|string|max:255',
            'notelp_rt' => [
                'required',
                'regex:/^[0-9]{10,12}$/',
            ],
            'alamat_rt' => 'required|string|max:255',
            'image' => 'required|file|mimes:jpg,jpeg,png|max:6144',
        ], [
            'nama_rt.required' => 'Nama lengkap RT wajib diisi.',
            'notelp_rt.required' => 'Nomor telepon wajib diisi.',
            'notelp_rt.regex' => 'Nomor telepon harus terdiri dari 10 hingga 12 digit angka tanpa simbol.',
            'alamat_rt.required' => 'Alamat KTP wajib diisi.',
            'image.required' => 'Image wajib diisi.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            $errorMessage = $errors->first();

            Alert::error('Add Data Failed', $errorMessage);

            return back()->withErrors($validator)->withInput();
        }
        
        $rt = dataRT::findOrFail($id);
        $input = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = $file->move(public_path('image'), $filename);
            $input['image'] = $filename;
        }
        $rt->update($input);

        Alert::success('Data Berhasil Diupdate!');
        return redirect('dashboard-data-rt');
    }

    public function destroy($id)
    {
        $rt = dataRT::findOrFail($id);
        if ($rt->image) {
            Storage::delete('public/image' . $rt->image);
        }
        $rt->delete();

        Alert::success('Data Berhasil Dihapus!');
        return redirect('dashboard-data-rt');
    }
}
