<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class KaryawanController extends Controller
{
    public function index(){
        $karyawan = DB::table('karyawan')
        ->orderBy('nama_lengkap')
        ->join('users', 'karyawan.lead_id', '=', 'users.id')
        ->select('karyawan.*', 'users.name as name') // Sesuaikan dengan kolom yang sesuai
        ->get();
        $user = DB::table('users')->get();
        return view('staf.index', compact ('karyawan','user'));
    }

    public function store_staf(Request $request){
        $nik = $request->nik;
        $nama_lengkap = $request->nama_lengkap;
        $jabatan = $request->jabatan;
        $lead_id = $request->lead_id;
        $password = Hash::make('123');

        try {
            $data = [
                'nik' => $nik,
                'nama_lengkap' => $nama_lengkap,
                'jabatan' => $jabatan,
                'lead_id' => $lead_id,
                'password' => $password,
            ];
            $simpan = DB::table('karyawan')->insert($data);
            if($simpan){
                return Redirect::back()->with(['success' => 'Staf berhasil disimpan']);
            }
        } catch (\Exception $e){
            return Redirect::back()->with(['warning' => 'Staf Gagal disimpan']);
        }
    }

    public function update_staf( Request $request){
        $nik = $request->nik;
        $nama_lengkap = $request->nama_lengkap;
        $jabatan = $request->jabatan;
        $lead_id = $request->lead_id;
        $password = Hash::make('123');
        $id = $request->id;

        try {
            $data = [
                'nik' => $nik,
                'nama_lengkap' => $nama_lengkap,
                'jabatan' => $jabatan,
                'lead_id' => $lead_id,
                'password' => $password,
            ];
            $update = DB::table('karyawan')->where('id', $id)->update($data);
            
            if($update){
                return redirect()->route('dashboard')->with('success', 'Karyawan update successfully.');
            }
        } catch (\Exception $e){
            dd($e);
            return Redirect::back()->with(['success' => 'User Gagal diupdate']);
            
        }
    }

    public function delete_staf($id){
        $delete = DB::table('karyawan')->where('id', $id)->delete();
        if($delete){
            return Redirect::back()->with(['success' => 'Data berhasil dihapus']);
        } else{
            return Redirect::back()->with(['success' => 'Data gagal dihapus']);
        }
    }

    public function laporan_karyawan(){
        $data_reports = DB::table('reports')->get();
        return view('staf.laporan_staf', compact('data_reports'));
    }

    public function terimaStatus($id){
        $status = 0;

        try {
            $data = [
                'status' => $status,
            ];
            $simpan = DB::table('reports')->where('id', $id)->update($data);

            if($simpan){
                return redirect('/panel/dashboardadmin')->with('success', 'Status Berhasil di ubah.');
            }
        } catch (\Exception $e){
            return redirect('/panel/dashboardadmin')->with(['warning' => 'Status Gagal diupdate']);
            
        }
    }

    public function deleteStatus($id){
        $status = 2;

        try {
            $data = [
                'status' => $status,
            ];
            $simpan = DB::table('reports')->where('id', $id)->update($data);
           
            if($simpan){
                return redirect('/panel/dashboardadmin')->with('success', 'Status berhasil diubah');
            }
        } catch (\Exception $e){
            redirect('/panel/dashboardadmin')->with('warning', 'Status Gagal diupdate.');
            
        }
    }

    public function buat_laporan(){
        $report = DB::table('reportlead')
        ->join('karyawan', 'reportlead.staf_id', '=', 'karyawan.id')
        ->select('reportlead.*', 'karyawan.nama_lengkap as name') // Sesuaikan dengan kolom yang sesuai
        ->get();
        $staf = DB::table('karyawan')->get();
        return view('staf.laporan-lead', compact ('report','staf' ));
    }

    public function store_report(Request $request){
        $judul_laporan = $request->judul_laporan;
        $isi_laporan = $request->isi_laporan;
        $staf_id = $request->staf_id;

        try {
            $data = [
                'judul_laporan' => $judul_laporan,
                'isi_laporan' => $isi_laporan,
                'staf_id' => $staf_id,
            ];
            $simpan = DB::table('reportlead')->insert($data);
            if($simpan){
                return redirect('/staf/buatlaporan')->with('success', 'data berhasil ditambahkan.');
            }
        } catch (\Exception $e){
            return redirect('/staf/buatlaporan')->with('warning', 'data gagal ditambahkan.');
        }
    }
}
