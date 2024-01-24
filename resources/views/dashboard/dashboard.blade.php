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
              Page
            </div>
            <h2 class="page-title">
              Staf Keren
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
                  New view
                </a>
              </span>
              <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                Create new report
              </a>
              <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
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
                <h3 class="card-title">Invoices</h3>
              </div>
              <div class="card-body border-bottom py-3">
                <div class="d-flex">
                  <div class="text-muted">
                    Show
                    <div class="mx-2 d-inline-block">
                      <input type="text" class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count">
                    </div>
                    entries
                  </div>
                  <div class="ms-auto text-muted">
                    Search:
                    <div class="ms-2 d-inline-block">
                      <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                    </div>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                  <thead>

                    <tr>
                      <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                      <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 15l6 -6l6 6" /></svg>
                      </th>
                      <th>NIK</th>
                      <th>Name Staf</th>
                      <th>Created</th>
                      <th>Title Report</th>
                      <th>Lihat</th>
                      <th>Status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data_reports as $row)
                    <tr>
                      <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                      <td><span class="text-muted">#</span></td>
                      <td><a href="#" class="text-reset" tabindex="-1">{{ $row->nik }}</a></td>
                      <td>
                        {{ $row->tgl_presensi }}
                      </td>
                      <td>
                        Alifa
                      </td>
                      <td>
                        {{ $row->judul_laporan }}
                      </td>
                      <td>
                        <a href="/detail" class="text-reset" tabindex="-1">Lihat</a>
                      </td>
                      <td>
                        @if ($row->status == 1)
                          <span class="badge bg-warning">Waiting</span>
                        @elseif ($row->status == 0)
                          <span class="badge bg-success">Approved</span>
                        @elseif ($row->status == 2)
                          <span class="badge bg-danger">Decline</span>
                        @endif
                      </td>
                      <td class="text-end">
                        <span class="dropdown">
                          <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                          <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">
                              Action
                            </a>
                            <a class="dropdown-item" href="#">
                              Another action
                            </a>
                          </div>
                        </span>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="card-footer d-flex align-items-center">
                <ul class="pagination m-0 ms-auto">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                      <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>
                      prev
                    </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('layouts.admin.footer')
  </div>
    
@endsection
<div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">New report</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/report/create" method="POST" id="frmreport">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Date</label>
                  <input type="date" id="tgl_presensi" name="tgl_presensi" class="form-control">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Title Report</label>
                  <input type="text"id="judul_laporan" name="judul_laporan" class="form-control">
                </div>
              </div>
              <div class="col-lg-12">
                <div>
                  <label class="form-label">Report</label>
                  <textarea class="form-control" id="isi_laporan" name="isi_laporan" rows="3"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
              Cancel
            </a>
            <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
              Create new report
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {

      $("#frmreport").submit(function() {
        var tgl_presensi = $("#tgl_presensi").val();
        var judul_laporan = $("#judul_laporan").val();
        var isi_laporan = $("#isi_laporan").val();
        if(tgl_presensi == "") {
          alert('Tanggal harus diisi');
          return false;
        } else if(judul_laporan == ""){
          alert('Judul Laporan harus diisi')
          return false;
        } else if(isi_laporan == ""){
          alert('Isi laporan harus diisi')
          return false;
        }
      });

    });
  </script>