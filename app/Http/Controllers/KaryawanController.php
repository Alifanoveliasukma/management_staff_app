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
        $karyawan = DB::table('karyawan')->orderBy('nama_lengkap')
        ->join('users', 'karyawan.lead_id', '=', 'users.id')->get();
        $user = User::all();
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
                return Redirect::back()->with(['success' => 'User berhasil disimpan']);
            }
        } catch (\Exception $e){
            return Redirect::back()->with(['success' => 'User Gagal disimpan']);
        }
    }

    public function update_staf($id, Request $request){
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
            $update = DB::table('karyawan')->where('id', $id)->update($data);
            if($update){
                return Redirect::back()->with(['success' => 'User berhasil diupdate']);
            }
        } catch (\Exception $e){
            return Redirect::back()->with(['success' => 'User Gagal diupdate']);
        }
    }
}
