@extends('layouts.tabler')
@section('content')
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
              Dashboard
            </div>
            @php 
                $messagesuccess = Session::get('success');
                $messagewarning = Session::get('warning');
                @endphp
                @if (Session::get('success'))
                <div class=" alert alert-success">
                  {{ $messagesuccess }}
                </div>
                @endif
                @if (Session::get('warning'))
                <div class=" alert alert-warning">
                  {{ $messagewarning }}
                </div>
                @endif
          </div>
          <!-- Page title actions -->
          <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
              <span class="d-none d-sm-inline">
                <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-tambahReport">
                  <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                  Buat Laporan
                </a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
        <div class="row row-deck row-cards">              
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Laporan</h3>
              </div>
              <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                  <thead>

                    <tr>
                      <th>No</th>
                      <th>NIK</th>
                      <th>Waktu</th>
                      <th>Judul</th>
                      <th>Detail</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data_reports as $row)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $row->nik}}</td>
                      <td>{{ $row->tgl_presensi}}</td>
                      <td>{{ $row->judul_laporan}}</td>
                      <td>{{ $row->isi_laporan}}</td>
                      <td>
                        @if ($row->status == 1)
                          <span class="badge bg-warning">Waiting</span>
                        @elseif ($row->status == 0)
                          <span class="badge bg-success">Approved</span>
                        @elseif ($row->status == 2)
                          <span class="badge bg-danger">Decline</span>
                        @endif
                      </td>
                      <td><a href="#" data-bs-toggle="modal" class="buttonedit"  data-tgl_presensi={{$row->tgl_presensi}} data-judul_laporan={{$row->judul_laporan}}  data-isi_laporan={{$row->isi_laporan}} data-id={{$row->id}} data-bs-target="#modal-edit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg></a>

                        <form action="/report/delete/{{$row->id}}" method="POST">
                          @csrf
                          <a class="btn btn-danger btn-sm delete-confirm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                          </a>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('layouts.admin.footer')
  </div>
  {{-- Modal edit --}}
<div class="modal modal-blur fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ubah Laporan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/report/create/" method="POST" id="frmReport">
          @csrf
          <div class="row">
            <div class="col-12">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-writing-sign" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 19c3.333 -2 5 -4 5 -6c0 -3 -1 -3 -2 -3s-2.032 1.085 -2 3c.034 2.048 1.658 2.877 2.5 4c1.5 2 2.5 2.5 3.5 1c.667 -1 1.167 -1.833 1.5 -2.5c1 2.333 2.333 3.5 4 3.5h2.5" /><path d="M20 17v-12c0 -1.121 -.879 -2 -2 -2s-2 .879 -2 2v12l2 2l2 -2z" /><path d="M16 7h4" /></svg>
                </span>
                <input type="date" name="tgl_presensi" id="tgl_presensi" value="" class="form-control" >
              </div>
            </div>
          </div>
          <input type="hidden" name="id" id="id" value="">
          <div class="row">
            <div class="col-12">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-robot-face" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 5h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2z" /><path d="M9 16c1 .667 2 1 3 1s2 -.333 3 -1" /><path d="M9 7l-1 -4" /><path d="M15 7l1 -4" /><path d="M9 12v-1" /><path d="M15 12v-1" /></svg>
                </span>
                <input type="text" name="judul_laporan" id="judul_laporan" value="" class="form-control" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-robot-face" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 5h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2z" /><path d="M9 16c1 .667 2 1 3 1s2 -.333 3 -1" /><path d="M9 7l-1 -4" /><path d="M15 7l1 -4" /><path d="M9 12v-1" /><path d="M15 12v-1" /></svg>
                </span>
                <textarea name="isi_laporan" id="isi_laporan" class="form-control"></textarea>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12">
              <div class="form-group">
                <button type="submit" class="btn btn-primary w-100">Simpan</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- Modal tambah --}}
<div class="modal modal-blur fade" id="modal-tambahReport" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Laporan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/report/create" method="POST" id="frmReport">
          @csrf
          <div class="row">
            <div class="col-12">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-writing-sign" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 19c3.333 -2 5 -4 5 -6c0 -3 -1 -3 -2 -3s-2.032 1.085 -2 3c.034 2.048 1.658 2.877 2.5 4c1.5 2 2.5 2.5 3.5 1c.667 -1 1.167 -1.833 1.5 -2.5c1 2.333 2.333 3.5 4 3.5h2.5" /><path d="M20 17v-12c0 -1.121 -.879 -2 -2 -2s-2 .879 -2 2v12l2 2l2 -2z" /><path d="M16 7h4" /></svg>
                </span>
                <input type="date" name="tgl_presensi" value="" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-robot-face" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 5h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2z" /><path d="M9 16c1 .667 2 1 3 1s2 -.333 3 -1" /><path d="M9 7l-1 -4" /><path d="M15 7l1 -4" /><path d="M9 12v-1" /><path d="M15 12v-1" /></svg>
                </span>
                <input type="text" name="judul_laporan" value="" class="form-control" placeholder="judul" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-robot-face" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 5h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2z" /><path d="M9 16c1 .667 2 1 3 1s2 -.333 3 -1" /><path d="M9 7l-1 -4" /><path d="M15 7l1 -4" /><path d="M9 12v-1" /><path d="M15 12v-1" /></svg>
                </span>
                <textarea name="isi_laporan" class="form-control"></textarea>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12">
              <div class="form-group">
                <button class="btn btn-primary w-100">Simpan</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@push('myscript')
<script>
  $(document).ready(function () {
    $(".buttonedit").click(function () {
        // Mengambil data dari atribut data-* pada tombol Edit
        var id = $(this).data('id');
        var tgl_presensi = $(this).data('tgl_presensi');
        var judul_laporan = $(this).data('judul_laporan');
        var isi_laporan = $(this).data('isi_laporan'); // Ubah sesuai kebutuhan

        $('#tgl_presensi').val(tgl_presensi);
        $('#judul_laporan').val(judul_laporan);
        $('#isi_laporan').val(isi_laporan);
        $('#id').val(id); // Ubah sesuai kebutuhan

        // Menampilkan modal
        $('#modal-edit').modal('show');
    });

    $(".delete-confirm").click(function (e) {
            var form = $(this).closest('form');
            e.preventDefault();
            var isConfirmed = confirm('Apakah Anda yakin ingin menghapus?');
            if (isConfirmed) {
              form.submit();
                $("#deleteForm").submit();
            }
        });
  
    $("#frmreport").submit(function(){
      var tgl_presensi = $("#tgl_presensi").val();
      var judul_laporan = $("#judul_laporan").val();
      var isi_laporan = $("#isi_laporan").val();

      if(tgl_presensi==""){
        alert('Tanggal harus diisi');
        return false;
      } else if(judul_laporan==""){
        alert('Judul harus diisi');
        return false;
      } else if(isi_laporan==""){
        alert('Laporan harus diisi');
        return false;
      }
    });
  });
</script>
@endpush
  
