@extends('layouts.main')
@section('content')
 <!-- Page Header-->
 <header class="bg-white shadow-sm px-4 py-3 z-index-20">
  <div class="container-fluid px-0">
    <h2 class="mb-0 p-1">{{ $tittle }}</h2>
  </div>
</header>
 <!-- Breadcrumb-->
 <div class="bg-white">
   <div class="container-fluid">
     <nav aria-label="breadcrumb">
       <ol class="breadcrumb mb-0 py-3">
         <li class="breadcrumb-item"><a class="fw-light" href="/dashboard">Home</a></li>
         <li class="breadcrumb-item active fw-light" aria-current="page">{{ $tittle }}</li>
       </ol>
     </nav>
   </div>
 </div>

 {{-- alert berhasil ditambahakn --}}
 @if(session()->has('successCreatePelanggan'))
 <div class="container-fluid py-2">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('successCreatePelanggan') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif
    {{-- alert data berhasil diupdate --}}
 @if(session()->has('successUpPelanggan'))
 <div class="container-fluid py-2">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('successUpPelanggan') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif
  {{-- alert berhasil dihapus --}}
  @if(session()->has('successDelPelanggan'))
  <div class="container-fluid py-2">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('successDelPelanggan') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif

  {{-- validasi notifikasi --}}
  @if ($errors->any())
  <div class="container-fluid py-2">
    <div class="alert alert-danger alert-dismissible dafe show" role="alert">
      Input data gagal, cek form tambah data!   
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif

 <div class="container-fluid w-100 ">
  <div class="d-flex justify-content-end py-2">
    <button class="btn btn-primary btn-md border-3" type="button" title="Tambah Data" data-bs-toggle="modal" data-bs-target="#modalPelanggan">+Tambah Data</button>
  </div>
  <div class="card-body py-2">
  <table id="example" class="row-border" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kontak</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($pelanggan as $plg)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $plg->nama }}</td>
                <td>{{ $plg->kontak }}</td>
                <td>{{ $plg->alamat }}</td>
                <td>{{ $plg->email }}</td>
                <td>
                  <a class="badge bg-warning border-0 m-1" href="/kelolaPelanggan/{{ $plg->id }}">
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                          <use xlink:href="#eye-1"> </use>
                      </svg>
                  </a>
                    <form action="/kelolaPelanggan/{{ $plg->id }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                    <button class="badge bg-danger border-0 m-1" type="submit" onclick="return confirm('ingin menghapus data ?')">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#bin-1"> </use>
                        </svg>
                    </button>
                    </form>
                </td>
            </tr>
          @endforeach
        </tbody>
  </table>
 </div>
 </div>

 
<!-- Modal Create -->
<div class="modal fade" id="modalPelanggan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/kelolaPelanggan" method="post" class="was-validated needs-validation" novalidate>
         @csrf
              <div class="mb-3 row postition-relative">
              <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
              <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="Nama" placeholder="Joe bid" value ="{{ old('nama') }}" autofocus required>
              @error('nama')
              <div class="invalid-feedback ">
                {{ $message }}
              </div>
              @enderror
              </div>
          </div>
          <div class="mb-3 row postition-relative">
              <label for="Kontak" class="col-sm-2 col-form-label">Kontak</label>
              <div class="col-sm-10">
              <input type="number" class="form-control @error('kontak') is-invalid @enderror" name="kontak" id="Kontak" value ="{{ old('kontak') }}" placeholder="08323243" required>
              @error('kontak')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              </div>
          </div>
          <div class="mb-3 row position-relative">
            <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="Alamat" value ="{{ old('alamat') }}" placeholder="Jl. kali acai" required>
              @error('alamat')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="mb-3 row postition-relative">
              <label for="Email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
              <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="Email" value ="{{ old('email') }}" placeholder="test@example.com" required>
              @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah</button>
          </form>
      </div>
    </div>
  </div>
</div>


@endsection