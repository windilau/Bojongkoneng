<?php

namespace App\Http\Controllers;

use App\Models\dataKeluarga;
use Illuminate\Http\Request;

class dataKeluargaController extends Controller
{
    public function index()
    {
        $data['DataKeluarga'] = dataKeluarga::all();
        return view('content.dashboard-data-keluarga', $data);
    }

    public function create()
    {
        return view('content.dashboard-data-keluarga-add');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        dataKeluarga::create($input);
        return redirect('dashboard-data-keluarga');
    }

    public function edit($id)
    {
        $dake = dataKeluarga::findOrFail($id);
        return view('content.dashboard-data-keluarga-edit', compact('dake'));
    }

    public function update(Request $request, $id)
    {
        $dake = dataKeluarga::findOrFail($id);
        $input = $request->all();
        $dake -> update($input);
        return redirect('dashboard-data-keluarga');
    }


    public function destroy($id)
    {
        $DataKeluarga = dataKeluarga::findOrFail($id);
        $DataKeluarga->delete();
        return redirect('dashboard-data-keluarga');
    }

}