<!-- resources/views/staff_reports/create.blade.php -->

@extends('master')

@section('konten')
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
      <div class="container-fluid">
        <!-- OVERVIEW -->
        <div class="panel panel-headline">
            <div class="panel-heading">
            <h3 class="panel-title">Selamat Datang <strong>{{ Auth::user()->name }}</strong></h3>
            <h2>Tambah Laporan</h2>
            <form action="/admin/staf/kirim" method="POST" enctype="multipart/form-data">
                @csrf
    
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Laporan</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
    
                <div class="mb-3">
                    <label for="lead_id" class="form-label">Pilih Lead</label>
                    <select class="form-control" id="lead_id" name="lead_id" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="mb-3">
                    <label for="detail" class="form-label">Detail Laporan</label>
                    <textarea class="form-control" id="detail" name="detail" rows="4" required></textarea>
                </div>
    
                
    
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            </div>   
        </div>
        <!-- END OVERVIEW -->
      </div>
    </div>
    <!-- END MAIN CONTENT -->
  </div>
@endsection
