<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $nik = Auth::guard('karyawan')->user()->nik;
        $data_reports = DB::table('reports')->where('nik', $nik)->get();
        return view('dashboard.dashboard', compact('data_reports'));
    }
}
