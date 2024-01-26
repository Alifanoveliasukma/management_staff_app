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
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Buat laporan</h3>
              </div>
              <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Penerima</th>
                      <th>Judul</th>
                      <th>isi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($report as $row)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $row->name }}</td>
                      <td>{{ $row->judul_laporan }}</td>
                      <td>{{ $row->isi_laporan }}</td>
                      {{-- <td><a href="#" data-bs-toggle="modal" class="buttonedit" data-name={{$row->name}} data-judu_laporan={{$row->judul_laporan}} data-isi_laporan={{$row->isi_laporan}} data-staf_id={{$row->staf_id}}  data-id={{$row->id}} data-bs-target="#modal-edit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg></a>

                        <form action="/staf/delete/{{$row->id}}" method="POST">
                          @csrf
                          <a class="btn btn-danger btn-sm delete-confirm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                          </a>
                        </form> --}}
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
        <h5 class="modal-title">Ubah Staf</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/staf/update/" method="POST" id="frmKaryawan">
          @method('PUT')
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
                <input type="number" name="nik" id="nik" value="" class="form-control" placeholder="Nik" >
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
                <input type="text" name="nama_lengkap" id="nama_lengkap" value="" class="form-control" placeholder="Nama Lengkap" >
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
                <input type="text" name="jabatan" id="jabatan" value="" class="form-control" placeholder="jabatan" >
              </div>
            </div>
          </div>
          {{-- <div class="row mt-2">
            <div class="col-12">
              <select name="staf_id" id="staf_id" class="form-select">
                <option value="">Lead</option>
                @foreach($user as $row)
                <option id="id" value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
              </select>
            </div>
          </div> --}}
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
          <h5 class="modal-title">Tambah Staf</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/staf/store/report" method="POST" id="frmKaryawan">
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
                  <input type="text" name="judul_laporan" value="" class="form-control" placeholder="Judul Laporan" >
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
                  <input type="text" name="isi_laporan" value="" class="form-control" placeholder="Isi Laporan" >
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12">
                <select name="staf_id" id="staf_id" class="form-select">
                  <option value="">Staf</option>
                  @foreach($staf as $row)
                  <option {{ Request('id')==$row->id ? 'selected' : ' '}} value="{{ $row->id }}">{{ $row->nama_lengkap }}</option>
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
<!-- Modal -->



@endsection
@push('myscript')
<script>
  $(document).ready(function () {
    $(".buttonedit").click(function () {
        // Mengambil data dari atribut data-* pada tombol Edit
        var id = $(this).data('id');
        var judul_laporan = $(this).data('judul_laporan');
        var isi_laporan = $(this).data('isi_laporan');
        var staf_id = $(this).data('staf_id');

        // Menetapkan nilai formulir modal dengan data yang diambil
        $('#judul_laporan').val(judul_laporan);
        $('#isi_laporan').val(isi_laporan);
        $('#staf_id').val(staf_id);
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

  });
</script>
@endpush