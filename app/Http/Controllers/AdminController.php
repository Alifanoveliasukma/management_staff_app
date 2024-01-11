<?php

namespace App\Http\Controllers;

use App\Models\Reportstaf;
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
        $reports = Reportstaf::all();
        return view('admin', compact('reports'));
    }
    function lead(){
        $terima_laporan = Reportstaf::with('staff')->paginate(30);
        return view('admin', compact('terima_laporan'));
    }
    function staf(){
        $reports = Reportstaf::all();
        return view('admin', compact('reports'));
    }

    function tombol_status($id){
        $setting_status = Reportstaf::find($id);

        if($setting_status){
            if($setting_status){
                $setting_status->status = 0;
            }
            else{
                $setting_status->status = 1;
            }

        $setting_status->save();
        }
        return back();
    }
}
