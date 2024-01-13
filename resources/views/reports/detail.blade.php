@extends('master')
@section('konten')
<div class="main">
  <!-- MAIN CONTENT -->
  <div class="main-content">
    <div class="container-fluid">
        <h3 class="page-title">Detail Laporan</h3>
        <div class="row">
            <div class="col-md-8">
                <!-- PANEL HEADLINE -->
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <h3 class="panel-title">Dibuat :</h3>
                        <p class="panel-subtitle">oleh : <b>{{$reports->staff->name}}</b>, Pada : {{$reports->waktu}}</p>
                        @if($reports->status == "diterima")
                            <p>Status : <span class="label label-success">Diterima</span></p>
                        @elseif($reports->status == "ditolak")
                            <p>Status : <span class="label label-danger">Ditolak</span></p>
                        @else
                            <p>Status : <span class="label label-primary">Proses</span></p>
                        @endif
                    </div>
                    <div class="panel-body">
                        <h4>{{$reports->judul}}</h4>
                        <p>{{$reports->detail}}</p>
                    </div>
                </div>
                <!-- END PANEL HEADLINE -->
            </div>
            @if ($reports->file)
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/' . $reports->file) }}" alt="Laporan Gambar" style="width: 100%; height: 100%;">
                    <div class="card-body">
                      <p class="card-text">hehe</p>
                    </div>
                  </div>
            </div>
            @endif
        </div>
    </div>
</div>
</div>
@endsection
