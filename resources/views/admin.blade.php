@extends('master')
@section('konten')
<div class="main">
  <!-- MAIN CONTENT -->
  <div class="panel">
      <div class="panel-heading">
          @if(Auth::user()->role == 'lead')
          <h2>Daftar Laporan</h2>
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
          @endif
          @if(Auth::user()->role == 'staf')
          <h2>Daftar Laporan</h2>
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
                    <td><a href="/admin/staf/lihat/{{$item->id}}"><span class="label label-info">Lihat</span></td></a>
                    <td>{{$item->status}}</td>
                    <td>
                      @if($item->status == "diterima")
                      <form action="{{ route('reports.delete', $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><span class="label label-danger">Hapus</span></button>
                      </form>
                      @elseif($item->status == "ditolak")
                        <a href="/admin/staf/update/{{ $item->id }}"><span class="label label-warning">Update | Revisi</span></a>
                      @else
                      <a href="#"><span class="label label-warning">--</span></a>
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
