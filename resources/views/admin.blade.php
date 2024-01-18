@extends('master')
@section('konten')
<div class="main">
  <!-- MAIN CONTENT -->
  <div class="panel">
      <div class="panel-heading">
          @if(Auth::user()->role == 'lead')
          <h2>Daftar Laporan</h2>
          {{ date('l, d F Y') }}
          @php
            // Dapatkan hari ini
            $today = strtolower(date('l'));

            // Periksa apakah laporan hari ini sudah ada atau belum
            $laporanHariIni = $terima_laporan->first(function ($item) use ($today) {
                return strtolower(date('l', strtotime($item->waktu))) === $today;
            });
        @endphp

        <div class="alert alert-{{ $laporanHariIni ? 'success' : 'warning' }}">
            @if ($laporanHariIni)
              Staf anda sudah membuat laporan hari ini.
            @else
              Staf anda belum membuat laporan hari ini 
            @endif
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
                            <td><a href="/admin/lead/lihat/{{$item->id}}"><span class="label label-info">Lihat</span></td>
                            <td>
                              @if($item->status == "proses")
                              <a href="/admin/leader/terima/{{ $item->id }}" class="badge bg-success text-wrap">
                                  <p>Terima</p>
                              </a>
                          
                              <a href="/admin/leader/tolak/{{ $item->id }}" class="badge bg-danger text-wrap">
                                  <p>Tolak</p>
                              </a>
                              @elseif($item->status == "diterima")
                                <p class="badge bg-primary text-wrap">diterima</p>
                              @elseif($item->status == "ditolak")
                                <p class="badge bg-primary text-wrap bg-sm">ditolak</p><br>
                                <a href="/admin/lead/masukan"><span class="badge bg-success text-wrap bg-sm">Buat Masukan</span></a>
                          @endif
                          
                            </td>
                            <td>Chat</td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            
            </div>
          @endif
          @if(Auth::user()->role == 'staf')
          <p>Lead : <span>{{ $lead_si_staf->name}}</span>
          <h2>Daftar Laporan</h2>
          {{ date('l, d F Y') }}
            <div class="panel-body">
              
              @php
            // Dapatkan hari ini
            $today = strtolower(date('l'));

            // Periksa apakah laporan hari ini sudah ada atau belum
            $laporanHariIni = $reports->first(function ($item) use ($today) {
                return strtolower(date('l', strtotime($item->waktu))) === $today;
            });
        @endphp

        <div class="alert alert-{{ $laporanHariIni ? 'success' : 'warning' }}">
            @if ($laporanHariIni)
              Anda sudah membuat laporan hari ini.
            @else
              Anda belum membuat laporan hari ini, segera buat laporan 
            @endif
        </div>
        
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
                    <td><a href="/admin/staf/lihat/{{$item->id}}"><span class="label label-info">Lihat</span></td></a>
                    <td>{{$item->status}}</td>
                    <td>
                      @if($item->status == "diterima")
                        <a href="#"><span class="label label-success">Selesai</span></a>
                      {{-- <form action="{{ route('reports.delete', $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><span class="label label-danger">Hapus</span></button>
                      </form> --}}
                      @elseif($item->status == "ditolak")
                        <a href="/admin/staf/update/{{ $item->id }}"><span class="label label-warning">Revisi</span></a>
                        {{-- <form action="{{ route('reports.delete', $item->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit"><span class="label label-danger">Hapus</span></button> --}}
                      @else
                      <a href="#"><span class="label label-warning">--------</span></a>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            
            </div>
          @endif           
      </div>
</div>
@endsection
