<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reportstaf;
use App\Models\User;

class ReportController extends Controller
{
    public function create()
    {
        $reports = Reportstaf::all();
        $users = User::all();
         //

        return view('reports.create', compact('users', 'reports'));
    }

    public function store(Request $request )
    {
        $reports = Reportstaf::with('lead')->paginate(30);
        $lead_si_staf = User::where('name', 'Lead A')->first();

        $request->validate([
            'judul' => 'required|string',
            'detail' => 'required|string',
        ]);

        if ($request->input('lead_id') == 2 || $request->input('lead_id') == 3 || $request->input('lead_id') == 4  ) {
            return redirect('/admin/staf/buatLaporan')->with(['error' => 'Anda hanya bisa mengirim laporan kepada lead A']);

        }

        $staffReport = new Reportstaf;
        $staffReport->waktu = now();
        $staffReport->judul = $request->input('judul');
        $staffReport->user_id = auth()->user()->id;
        $staffReport->lead_id = $lead_si_staf->id;
        $staffReport->detail = $request->input('detail');

        // Upload file jika ada
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public', $fileName);
            $staffReport->file = $fileName;
        }

        $staffReport->save();
        
        return redirect()->route('halamanStaf')->with('reports', $reports);

    }

    public function view_update(string $id)
    {
        $reports = Reportstaf::findOrFail($id);

        return view('reports.edit', compact('reports'));
    }

    public function update_store(Request $request, $id){
        $request->validate([
            'judul' => 'required|string',
            'detail' => 'required|string',
        ]);
        $reports = Reportstaf::find($id);
        $reports->update($request->all());
        return redirect()->route('halamanStaf');
    }

    public function delete_laporan($id)
    {
        $reports = Reportstaf::find($id);
        $reports->delete();
        return redirect()->route('halamanStaf');
    }

    public function detail_laporan($id)
    {
        $reports = Reportstaf::find($id);
        return view('reports.detail', compact('reports'));
    }

    public function detail_laporan_lead($id)
    {
        $reports = Reportstaf::find($id);
        return view('reports.detail', compact('reports'));
    }

    public function belum(){
        return view('reports.belum');
    }
    

}

