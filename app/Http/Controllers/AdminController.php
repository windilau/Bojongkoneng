<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('Content.dashboard-admin', compact('users'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        User::create($input);
        return redirect('dashboard-admin');
    }

    public function edit(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users = User::create([
            'password' => Hash::make($request->password),
        ]);
        return view('content.dashboard-admin', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ]);

        // Cek jika validasi gagal
        if ($validator->fails()) {
            $errors = $validator->errors();

            $errorMessage = $errors->first();

            Alert::error('Failed Change Password', $errorMessage);

            return back()->withErrors($validator)->withInput();
        }

        // Current Password gagal
        $user = auth()->user();

        if (!Hash::check($request->input('current_password'), $user->password)) {
            
            Alert::error('Failed Change Password', 'Current password is incorrect');
            return back()->withInput();
        }

        // Jika Berhasil
        if (Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update(['password' => Hash::make($request->password)]);

            Alert::success('Password Berhasil Dirubah!')->persistent();
            return back()->with('success', 'Your password has been changed');
        }

    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);

        $users->delete();
        return redirect('dashboard-admin');
    }
}
