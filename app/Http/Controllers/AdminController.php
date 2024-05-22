<?php

namespace App\Http\Controllers;
use App\Models\User;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        $users = User::all();
        return view('bokoin.content.landingPage', compact('users'));
    }
    public function index()
    {
        $users = User::all();
        return view('Content.dashboard-admin', compact('users'));
    }

    public function create()
    {
        return view('Content.dashboard-admin-add');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        User::create($input);
        return redirect('dashboard-admin');
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('content.dashboard-admin-edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $input = $request->all();

        $users->update($input);
        return redirect('dashboard-admin');
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
    
        $users->delete();
        return redirect('dashboard-admin');
    }

}