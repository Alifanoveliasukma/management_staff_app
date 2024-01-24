<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class KaryawanController extends Controller
{
    public function index(){
        $karyawan = DB::table('karyawan')->orderBy('nama_lengkap')
        ->join('users', 'karyawan.lead_id', '=', 'users.id')
        ->get();
        return view('staf.index', compact ('karyawan'));
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
                return Redirect::back()->with(['success' => 'User berhasil disimpan']);
            }
        } catch (\Exception $e){
            return Redirect::back()->with(['success' => 'User Gagal disimpan']);
        }
    }
}
