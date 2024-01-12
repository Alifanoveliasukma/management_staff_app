
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
            @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
            <h2>Update Laporan</h2>
            <form action="/admin/staf/{{$reports->id}}/update" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Laporan</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul', $reports->judul) }}" placeholder="Masukkan Judul Post">
                </div>
    
                {{-- <div class="mb-3">
                    <label for="lead_id" class="form-label">Pilih Lead</label>
                    <select class="form-control" id="lead_id" name="lead_id" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div> --}}
    
                <div class="mb-3">
                    <label for="detail" class="form-label">Detail Laporan</label>
                    <textarea id="detail" class="form-control" name="detail" required>{{ $reports->detail}}</textarea>
                </div>
    
                
    
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
            </div>   
        </div>
        <!-- END OVERVIEW -->
      </div>
    </div>
    <!-- END MAIN CONTENT -->
  </div>
@endsection
