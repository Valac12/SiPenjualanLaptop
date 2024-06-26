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
           <li class="breadcrumb-item"><a class="fw-light" href="/kelolaKasir">Kelola Kasir</a></li>
           <li class="breadcrumb-item active fw-light" aria-current="page">{{ $tittle }}</li>
         </ol>
       </nav>
     </div>
   </div>

   
   <div class="container-xl px-4">
   <hr class="mt-0">
    <div class="row py-4 justify-content-center">
        <div class="col-xl-9 ">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header py-2">
                    <div class="row">

                       {{-- validasi notifikasi error --}}
                      @if ($errors->any())
                      <div class="container-fluid py-2">
                        <div class="alert alert-danger alert-dismissible dafe show" role="alert">
                          Input data gagal, cek form edit data!   
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      </div>
                      @endif

                      {{-- Validasi berhasil update --}}
                      @if(session()->has('successUpUser'))
                      <div class="container px-3 py-2">
                       <div class="alert alert-warning alert-dismissible fade show" role="alert">
                       {{ session('successUpUser') }}
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                       </div>
                     </div>
                     @endif

                      {{-- alert password tidak sesuai --}}
                      @if(session()->has('faillUpUser'))
                      <div class="container-fluid py-2">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('faillUpUser') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      </div>
                      @endif

                        <div class="col py-2">
                            Account Details
                        </div>
                        <div class="col text-end">
                            <button class="btn btn-warning border-0 m-1 text-white" title="Tambah Data" data-bs-toggle="modal" data-bs-target="#modalEditAdmin{{ $kasirId->id }}">
                                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                                    <use xlink:href="#edit-window-1"> </use>
                                </svg>
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        <!-- Form Group Nama-->
                        <div class="mb-3">
                            <label class="small mb-1" for="Nama">Nama</label>
                            <input class="form-control" id="Nama" type="text" value="{{ $kasirId->name }}" readonly>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group Username-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="Username">Username</label>
                                <input class="form-control" id="Username" type="text" value="{{ $kasirId->username }}" readonly>
                            </div>
                            <!-- Form Group Password-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="Password">Password</label>
                                <input class="form-control" id="Password" type="pass" value="{{ $kasirId->password }}" readonly>
                            </div>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group Alamat-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="Alamat">Alamat</label>
                                <input class="form-control" id="Alamat" type="text" value="{{ $kasirId->alamat }}" readonly>
                            </div>
                            <!-- Form Group Tgl Lahir-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="TglLahir">Tgl lahir</label>
                                <input class="form-control" id="TglLahir" type="text" value="{{ $kasirId->tgl_lahir }}" readonly>
                            </div>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group JK-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="JK">Jenis Kelamin</label>
                                <input class="form-control" id="JK" type="text" value="{{ $kasirId->jk }}" readonly>
                            </div>
                            <!-- Form Group Kontak-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="Kontak">Kontak</label>
                                <input class="form-control" id="Kontak" type="text" value="{{ $kasirId->kontak }}" readonly>
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group Leve-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="Level">Level</label>
                                <input class="form-control" id="Level" type="text" value="{{ $kasirId->level }}" readonly>
                            </div>
                            <!-- Form Group Nama Level-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="NamaLevel">Nama Level</label>
                                <input class="form-control" id="NamaLevel" type="text" value="{{ $kasirId->level_name }}" readonly>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group Created At -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="CreatedAt">Created At</label>
                                <input class="form-control" id="CreatedAt" type="text" value="{{$kasirId->created_at }}" readonly>
                            </div>
                            <!-- Form Group Tanggal Updated At -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="UpdatedAt">Updated At</label>
                                <input class="form-control" id="UpdatedAt" type="text" value="{{ $kasirId->updated_at }}" readonly   >
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Edit --}}
<div class="modal fade" id="modalEditAdmin{{ $kasirId->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data {{ $kasirId->name }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/kelolaKasir/{{ $kasirId->id }}" method="post" class="was-validated needs-validation" novalidate>
          @method('put')
            @csrf
            <div class="mb-3 row postition-relative">
                <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="Nama" placeholder="Joe bid" value ="{{ old('name', $kasirId->name) }}" autofocus required>
                @error('name')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
            <div class="mb-3 row postition-relative">
                <label for="Username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="Username" value ="{{ old('username', $kasirId->username) }}" placeholder="joebidz" required>
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
            <div class="mb-3 row position-relative">
                <label for="Password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="Password" placeholder="****" required>
                    <span class="badge text-bg-warning">Konfirmasi Password</span>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row postition-relative">
                <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="Alamat" value ="{{ old('alamat', $kasirId->alamat) }}" placeholder="Jl. Kali Acai" required>
                @error('alamat')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
            <div class="mb-3 row postition-relative">
                <label for="TglLahir" class="col-sm-2 col-form-label">Tgl Lahir</label>
                <div class="col-sm-10">
                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" id="TglLahir" value ="{{ old('tgl_lahir', $kasirId->tgl_lahir) }}" placeholder="01-01-1999" required>
                @error('tgl_lahir')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
            <div class="mb-3 row postition-relative">
                <label for="JK" class="col-sm-2 col-form-label">JK</label>
                <div class="col-sm-10">
                <input type="text" class="form-control @error('jk') is-invalid @enderror" name="jk" id="JK" value ="{{ old('jk', $kasirId->jk) }}" placeholder="L/P" required>
                @error('jk')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
            <div class="mb-3 row postition-relative">
                <label for="Kontak" class="col-sm-2 col-form-label">Kontak</label>
                <div class="col-sm-10">
                <input type="text" class="form-control @error('kontak') is-invalid @enderror" name="kontak" id="Kontak" value ="{{ old('kontak', $kasirId->kontak) }}" placeholder="081344746157" required>
                @error('kontak')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
            <div class="mb-3 row postition-relative">
              <label for="Level" class="col-sm-2 col-form-label">Level</label>
              <div class="col-sm-10">
                <select class="form-select @error('level') is-invalid @enderror" name="level" id="level" aria-label="select example" required>
                  <option value="{{ old('level', $kasirId->level) }}">{{ old('level', $kasirId->level) }}</option>
                  <option value="">2</option>
                </select>
                @error('level')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="mb-3 row postition-relative">
              <label for="NamaLevel" class="col-sm-2 col-form-label">Nama Level</label>
              <div class="col-sm-10">
              <input type="text" class="form-control @error('level_name') is-invalid @enderror" value="{{ old('level_name', $kasirId->level_name) }}" name="level_name" id="NamaLevel" placeholder="Administrator | User" required readonly>
              @error('level_name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Edit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection