<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index(){
        echo "Halo selamat datang";
        echo "<h1>".Auth::user()->name . "</h1>";
        echo "<a href='logout'>Logout >></a> ";
    }
    function lead(){
        echo "Halo selamat datang di halaman lead";
        echo "<h1>".Auth::user()->name . "</h1>";
        echo "<a href='logout'>Logout >></a> ";
    }
    function staf(){
        echo "Halo selamat datang di halaman staf";
        echo "<h1>".Auth::user()->name . "</h1>";
        echo "<a href='logout'>Logout >></a> ";
    }
}
