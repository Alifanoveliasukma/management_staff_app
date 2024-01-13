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
                            <p>Status : <span class="label label-danger">Proses</span></p>
                        @endif
                    </div>
                    <div class="panel-body">
                        <h4>{{$reports->judul}}</h4>
                        <p>{{$reports->detail}}</p>
                    </div>
                </div>
                <!-- END PANEL HEADLINE -->
            </div>
            <div class="col-md-4">
                <!-- PANEL NO PADDING -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">File atau Gambar</h3>
                        <div class="right">
                            <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                            <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                        </div>
                    </div>
                    <div class="panel-body no-padding bg-primary text-center">
                        <div class="padding-top-30 padding-bottom-30">
                            <i class="fa fa-thumbs-o-up fa-5x"></i>
                            <h3>No Content Padding</h3>
                        </div>
                    </div>
                </div>
                <!-- END PANEL NO PADDING -->
            </div>
        </div>
    </div>
</div>
</div>
@endsection
