<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function proseslogin(Request $request)
    {
        if(Auth::guard('karyawan')->attempt(['nik'=> $request->nik, 'password' => $request->password])){
            return redirect('/dashboard');
        } else {
            echo"gagal login";
        }
    }
}
// $2y$12$Wl0xf/o69JQp3/PjCJcViOgA2w97ELlvHH/7e9AXZMAkoZAbUqMFm
