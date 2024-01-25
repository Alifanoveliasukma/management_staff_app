@extends('layouts.tabler')
@section('content')
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <h2 class="page-title">
              Dashboard
            </h2>
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
                <a href="#" class="btn">
                  Create Report
                </a>
              </span>
              <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-tambahstaf">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                Add User
              </a>
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
                <h3 class="card-title">Staf Master</h3>
              </div>
              <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIK</th>
                      <th>Nama Lengkap</th>
                      <th>Lead</th>
                      <th>Jabatan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($karyawan as $row)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $row->nik }}</td>
                      <td>{{ $row->nama_lengkap }}</td>
                      <td>{{ $row->name }}</td>
                      <td>{{ $row->jabatan }}</td>
                      <td><a href="#" class="btn btn-success" id="btnUpdatestaf">Update</a></td>
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
  {{-- Modal update --}}
  <div class="modal modal-blur fade" id="modal-tambahstaf" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Staf</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/staf/store" method="POST" id="frmKaryawan">
            @csrf
            <div class="row">
              <div class="col-12">
                <div class="input-icon mb-3">
                  <span class="input-icon-addon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-scan" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <path d="M4 7v-1a2 2 0 0 1 2 -2h2" />
                      <path d="M4 17v1a2 2 0 0 0 2 2h2" />
                      <path d="M16 4h2a2 2 0 0 1 2 2v1" />
                      <path d="M16 20h2a2 2 0 0 0 2 -2v-1" />
                      <path d="M5 12l14 0" /></svg>
                  </span>
                  <input type="text" name="nik" value="" class="form-control" placeholder="Nik" >
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="input-icon mb-3">
                  <span class="input-icon-addon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-writing-sign" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 19c3.333 -2 5 -4 5 -6c0 -3 -1 -3 -2 -3s-2.032 1.085 -2 3c.034 2.048 1.658 2.877 2.5 4c1.5 2 2.5 2.5 3.5 1c.667 -1 1.167 -1.833 1.5 -2.5c1 2.333 2.333 3.5 4 3.5h2.5" /><path d="M20 17v-12c0 -1.121 -.879 -2 -2 -2s-2 .879 -2 2v12l2 2l2 -2z" /><path d="M16 7h4" /></svg>
                  </span>
                  <input type="text" name="nama_lengkap" value="" class="form-control" placeholder="Nama Lengkap" >
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
                  <input type="text" name="jabatan" value="" class="form-control" placeholder="jabatan" >
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12">
                <select name="lead_id" id="lead_id" class="form-select">
                  <option value="">Lead</option>
                  @foreach($user as $row)
                  <option {{ Request('id')==$row->id ? 'selected' : ' '}} value="{{ $row->id }}">{{ $row->name }}</option>
                  @endforeach
                </select>
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
    $(function() {
      $("#btnUpdatestaf").click(function(){
        $("#modal-updatestaf").modal('show');
      });

      $("#frmKaryawan").submit(function(){
        var nik = $("#nik").val();
        var nama_lengkap = $("#nama_lengkap").val();
        var jabatan = $("#jabatan").val();
        var lead_id = $("#lead_id").val();
        if(nik==""){
          alert('Nik harus diisi');
          return false;
        }else(nama_lengkap==""){
          alert('nama lengkap harus diisi');
          return false;
        }else(jabatan==""){
          alert('jabatan harus diisi');
          return false;
        }else(lead_id==""){
          alert('lead harus diisi');
          return false;
        }
      });
    });
  </script>
@endpush
  