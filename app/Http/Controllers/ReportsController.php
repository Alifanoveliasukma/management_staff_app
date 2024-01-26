<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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

    public function update_report( Request $request){
        $tgl_presensi = $request->tgl_presensi;
        $judul_laporan = $request->judul_laporan;
        $isi_laporan = $request->isi_laporan;
        $id = $request->id;

        try {
            $data = [
                'tgl_presensi' => $tgl_presensi,
                'judul_laporan' => $judul_laporan,
                'isi_laporan' => $isi_laporan,
            ];
            $update = DB::table('reports')->where('id', $id)->update($data);
            
            if($update){
                return redirect()->route('dashboard-staf')->with('success', 'Karyawan update successfully.');
            }
        } catch (\Exception $e){
            dd($e);
            return Redirect::back()->with(['success' => 'User Gagal diupdate']);
            
        }
    }

    public function delete_report($id){
        $delete = DB::table('reports')->where('id', $id)->delete();
        if($delete){
            return Redirect::back()->with(['success' => 'Data berhasil dihapus']);
        } else{
            return Redirect::back()->with(['success' => 'Data gagal dihapus']);
        }
    }

}
