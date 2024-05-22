<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mutasi;

class MutasiController extends Controller
{
    public function index() {
        $data['mutasi'] = Mutasi::all();
        return view('content.dashboard-mutasi', $data);
    }

    public function create() {
        return view('content.dashboard-mutasi-add');
    }

    public function store(Request $request) {
        $request->validate([
            'nik' => 'required|digits:16'
        ]);
        $input = $request->all();
        Mutasi::create($input);
        return redirect('dashboard-mutasi');
    }

    public function edit($id) {
        $mutasi = mutasi::findOrFail($id);
        return view('content.dashboard-mutasi-edit', compact('mutasi'));
    }

    public function update(Request $request, $id) {
        $mutasi = mutasi::findOrFail($id);
        $input = $request->all();
        $mutasi->update($input);
        return redirect('dashboard-mutasi');
    }

    public function destroy($id) {
        $mutasi = mutasi::findOrFail($id);
        $mutasi->delete();
        return redirect('dashboard-mutasi');
    }
}