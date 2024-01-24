<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function store_report(Request $request)
    {
        $nik = Auth::guard('karyawan')->user()->nik;
        $tgl_presensi = $request->tgl_presensi;
        $judul_laporan = $request->judul_laporan;
        $isi_laporan = $request->isi_laporan;

        $data = [
            'nik' => $nik,
            'tgl_presensi' => $tgl_presensi,
            'judul_laporan' => $judul_laporan,
            'isi_laporan' => $isi_laporan,
        ];

        $simpan = DB::table('reports')->insert($data);

        if($simpan){
            return redirect('/dashboard')->with(['success' => 'Data Berhasil disimpan']);
        }else{
            return redirect('/dashboard')->with(['warning' => 'Data Gagal disimpan']);
        }
    }
}
