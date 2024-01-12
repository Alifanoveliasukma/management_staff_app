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
            @if(Auth::user()->role == 'lead')
            <div class="panel">
              <div class="panel-heading">
                <h3 class="panel-title">Laporan yang sudah dibuat :</h3>
              </div>
              <div class="panel-body">
                <table class="table table-hover">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Date/Time</th>
                          <th>Report Title</th>
                          <th>Staf</th>
                          <th>Detail</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($terima_laporan as $k => $item)
                          <tr>
                              <td>{{ $k+1 }}</td>
                              <td>{{ $item->waktu }}</td>
                              <td>{{ $item->judul }}</td>
                              <td>{{ $item->staff->name }}</td>
                              <td>{{ $item->detail }}</td>
                              <td>
                                @if($item->status == "proses")
                                <a href="/admin/leader/terima/{{ $item->id }}" class="btn btn-sm btn-success">
                                    <p>Terima</p>
                                </a>
                            
                                <a href="/admin/leader/tolak/{{ $item->id }}" class="btn btn-sm btn-danger">
                                    <p>Tolak</p>
                                </a>
                                @elseif($item->status == "diterima")
                                  <p class="badge bg-primary text-wrap">Selesai | laporan diterima</p>
                                @elseif($item->status == "ditolak")
                                  <p class="badge bg-primary text-wrap">Selesai | laporan ditolak</p>
                            @endif
                            
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
              
              </div>
            </div>
            @endif
            @if(Auth::user()->role == 'staf')
            <div class="panel">
              <div class="panel-heading">
                <h3 class="panel-title">Laporan yang sudah dibuat :</h3>
              </div>
              <div class="panel-body">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Date/Time</th>
                      <th>Report Title</th>
                      <th>Recipient</th>
                      <th>Detail</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($reports as $k => $item)
                    <tr>
                      <td>{{$k+1}}</td>
                      <td>{{$item->waktu}}</td>
                      <td>{{$item->judul}}</td>
                      <td>{{$item->lead->name}}</td>
                      <td>{{$item->detail}}</td>
                      <td>{{$item->status}}</td>
                      <td>
                        @if($item->status == "diterima")
                        <a href="/admin/staf/hapus/{{ $item->id }}" class="btn btn-sm btn-success">
                            <p>Hapus Laporan</p>
                        </a>
                        @elseif($item->status == "ditolak")
                          <a href="/admin/staf/update/{{ $item->id }}"><p class="badge bg-danger text-wrap">Update | Revisi</p></a>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            @endif
          </div>
          {{-- @if(Auth::user()->role == 'lead')
          <div>
              <a href="#" class="btn btn-sm btn-secondary">Menu Lead</a>
          </div>
          @endif
          @if(Auth::user()->role == 'staf')
          <div>
              <a href="#" class="btn btn-sm btn-secondary">Menu Staf</a>
          </div>
          @endif --}}
      </div>
      
      </div>
      <!-- END OVERVIEW -->
    </div>
  </div>
  <!-- END MAIN CONTENT -->
</div>
  
@endsection

{{-- <div class="bg-white container-sm col-6 border my-3 rounded px-5 py-3 pb-5">
  <h1>Halo!!</h1>
  <div>Selamat datang di halaman admin</div>
  
  <div class="card mt-3">
    <ul class="list-group list-group-flush">
      @if(Auth::user()->role == 'lead')
      <li class="list-group-item">Menu Lead</li>
      @endif
      @if(Auth::user()->role == 'staf')
      <li class="list-group-item">Menu staf</li>
      @endif
    </ul>
  </div> --}}