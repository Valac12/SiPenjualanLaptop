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
           <li class="breadcrumb-item"><a class="fw-light" href="/kelolaPelanggan">Pelanggan</a></li>
           <li class="breadcrumb-item active fw-light" aria-current="page">{{ $tittle }}</li>
         </ol>
       </nav>
     </div>
   </div>

<div class="container-fluid shadow  p-3 mb-5 bg-body-tertiary rounded ">
    <form action="/kelolaPelanggan/{{ $Ebi->id }}" method="post" enctype="multipart/form-data" class="was-validated needs-validation">
      @method('put')
      @csrf
    <div class="row align-items-end mx-2 my-2 g-2">

        <div class="col-3">
            <div class="mb-3">
                <label for="Nama" class="col-sm-4 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="Nama" value ="{{ old('nama', $Ebi->nama) }}"  placeholder="joe bid" required>
                @error('nama')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="mb-3">
                <label for="kontak" class="col-sm-4 col-form-label">Kontak</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('kontak') is-invalid @enderror" name="kontak" id="Kontak" value ="{{ old('kontak', $Ebi->kontak) }}"  placeholder="3223232" required>
                @error('kontak')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="mb-3">
                <label for="Alamat" class="col-sm-4 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="Alamat" value ="{{ old('alamat', $Ebi->alamat) }}"  placeholder="Jl. Kali Acai" required>
                @error('alamat')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="mb-3">
                <label for="Email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="Email" value ="{{ old('email', $Ebi->email) }}"  placeholder="test@example.com" required>
                @error('email')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        </div>
        
      </div>
      <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin data akan diubah?')">Edit</button>
  </form>
</div>


@endsection