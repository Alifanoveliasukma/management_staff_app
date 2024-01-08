<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index()
    {
        return view('admin');
    }
    function lead(){
        return view('admin');
    }
    function staf(){
        return view('admin');
    }
}
