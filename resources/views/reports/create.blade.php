<!-- resources/views/staff_reports/create.blade.php -->

@extends('master')

@section('konten')
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Selamat Datang <strong>{{ Auth::user()->name }}</strong></h3>
            <h2>Buat Laporan</h2>
            @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
        </div>
        <div class="panel-body">
            <form action="/admin/staf/kirim" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Laporan</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
            
                <div class="mb-3">
                    <label for="detail" class="form-label">Laporan</label>
                    <textarea class="form-control" id="detail" name="detail" rows="4" required></textarea>
                </div>
            
                <button type="submit" class="btn btn-warning btn-toastr">Simpan</button>
            </form>
            
            </div>
        </div>
</div>
    <!-- END MAIN CONTENT -->
@endsection