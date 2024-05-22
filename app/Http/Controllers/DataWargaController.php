<?php

namespace App\Http\Controllers;
use App\Models\DataWarga;
use Illuminate\Http\Request;

class DataWargaController extends Controller
{
    public function index()
    {
        $datawarga = DataWarga::all();
        return view('content.dashboard-warga', compact('datawarga'));
    }

    public function create()
    {
        return view('content.dashboard-warga-add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|digits:16'
        ]);
        $input = $request->all();
        DataWarga::create($input);
        return redirect('dashboard-warga');
    }

    public function edit($id)
    {
        $datawarga = DataWarga::findOrFail($id);
        return view('content.dashboard-warga-edit', compact('datawarga'));
    }

    public function update(Request $request, $id)
    {
        $datawarga = DataWarga::findOrFail($id);
        $input = $request->all();
        $datawarga->update($input);
        return redirect('dashboard-warga');
    }

    public function destroy($id)
    {
        $datawarga = DataWarga::findOrFail($id);
        $datawarga->delete();
        return redirect('dashboard-warga');
    }
}
