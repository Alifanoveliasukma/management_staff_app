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
        $reports = Reportstaf::all();
        return view('admin', compact('reports'));
    }
    function staf(){
        $reports = Reportstaf::all();
        return view('admin', compact('reports'));
    }
}
