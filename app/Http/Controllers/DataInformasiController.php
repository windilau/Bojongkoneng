<?php

namespace App\Http\Controllers;
use App\Models\DataInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $input = $request->all();

        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = $file->move(public_path('pdf'), $filename);
            $input['pdf'] = $filename;
        }

        DataInformasi::create($input);
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
        return redirect('dashboard-informasi');
    }

    public function destroy($id)
    {
        $datainformasi = DataInformasi::findOrFail($id);
        if ($datainformasi->pdf) {
            Storage::delete('public/pdf' . $datainformasi->pdf);
        }
        $datainformasi->delete();
        return redirect('dashboard-informasi');
    }

}