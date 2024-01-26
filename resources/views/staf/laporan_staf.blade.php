@extends('layouts.tabler')
@section('content')
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
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
@endsection
