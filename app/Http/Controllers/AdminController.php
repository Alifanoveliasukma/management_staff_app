<?php

namespace App\Http\Controllers;

use App\Models\Reportstaf;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    function view()
    {
        return view('master');
    }
    function index()
    {
        $terima_laporan = Reportstaf::with('staff')->paginate(30);
        $reports = Reportstaf::all();
        return view('admin', compact('reports','terima_laporan'));
    }
    function lead(){
        $terima_laporan = Reportstaf::with('staff')->paginate(30);
        return view('admin', compact('terima_laporan'));
    }
    function staf(){
        $lead_si_staf = User::where('name', 'Lead A')->first();
        $reports = Reportstaf::all();
        return view('admin', compact('reports', 'lead_si_staf'));
    }

    function terimaStatus($id){
        $setting_status = Reportstaf::find($id);
        $setting_status->status = 'diterima';

        $setting_status->save();
        return redirect()->route('halamanStaf');

    }
    function deleteStatus($id){
        $setting_status = Reportstaf::find($id);
        $setting_status->status = 'ditolak';

        $setting_status->save();
        return redirect()->route('halamanStaf');

    }
}
