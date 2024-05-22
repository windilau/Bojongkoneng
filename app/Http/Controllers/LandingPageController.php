<?php

namespace App\Http\Controllers;
use App\Models\DataInformasi;
use App\Models\DataRT;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $datainformasi = DataInformasi::all();
        $rt = dataRT::all();
        return view('bokoin.content.landingPage', compact('datainformasi', 'rt'));
    }
}
