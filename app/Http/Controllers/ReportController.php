<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reportstaf;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function create()
    {
        // Ambil data user untuk populate dropdown atau sesuaikan kebutuhan Anda
        $users = User::all();
         //

        return view('reports.create', compact('users'));
    }

    public function store(Request $request)
    {
        $reports = Reportstaf::with('lead')->paginate(30);

        $request->validate([
            'judul' => 'required|string',
            'lead_id' => 'required|exists:users,id',
            'detail' => 'required|string',
            'file' => 'nullable|file|max:10240', // 10 MB max, adjust as needed
        ]);

        if ($request->input('lead_id') == 2 || $request->input('lead_id') == 3 || $request->input('lead_id') == 4  ) {
            return redirect('/admin/staf/laporan')->with(['error' => 'Anda tidak boleh mengirim laporan kepada lead selain lead A']);

        }

        $staffReport = new Reportstaf;
        $staffReport->waktu = now();
        $staffReport->judul = $request->input('judul');
        $staffReport->user_id = auth()->user()->id;
        $staffReport->lead_id = $request->input('lead_id');
        $staffReport->detail = $request->input('detail');

        // Upload file jika ada
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public', $fileName);
            $staffReport->file = $fileName;
        }


        $staffReport->save();
        
        return view('admin', compact('reports','terima_laporan'));
    }
}

