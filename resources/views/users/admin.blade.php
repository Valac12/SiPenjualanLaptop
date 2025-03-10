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
 @if(session()->has('successCreateAdmin'))
 <div class="container-fluid py-2">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('successCreateAdmin') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif
  {{-- alert berhasil dihapus --}}
  @if(session()->has('successDelAdmin'))
  <div class="container-fluid py-2">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('successDelAdmin') }}
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
    <button class="btn btn-primary btn-md border-3" type="button" title="Tambah Data" data-bs-toggle="modal" data-bs-target="#modalAdmin">+Tambah Data</button>
  </div>
  <div class="card-body py-2">
  <table id="example" class="row-border" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Alamat</th>
                <th>tgl lahir</th>
                <th>Jk</th>
                <th>Kontak</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($userAdmin as $ua)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ua->name }}</td>
                <td>{{ $ua->username }}</td>
                <td>{{ $ua->alamat }}</td>
                <td>{{ $ua->tgl_lahir }}</td>
                <td>{{ $ua->jk }}</td>
                <td>{{ $ua->kontak }}</td>
                <td>{{ $ua->level_name }}</td>
                <td>
                  <a class="badge bg-warning border-0 m-1" href="/kelolaAdmin/{{ $ua->id }}">
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                          <use xlink:href="#eye-1"> </use>
                      </svg>
                  </a>
                    <form action="/kelolaAdmin/{{ $ua->id }}" method="post" class="d-inline">
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
<div class="modal fade" id="modalAdmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data {{ $ua->name }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/kelolaAdmin" method="post" class="was-validated needs-validation" novalidate>
         @csrf
              <div class="mb-3 row postition-relative">
              <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="Nama" placeholder="Joe bid" value ="{{ old('name') }}" autofocus required>
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
              <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="Username" value ="{{ old('username') }}" placeholder="joebidz" required>
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
              <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="Alamat" value ="{{ old('alamat') }}" placeholder="jl.kali acai" required>
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
              <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" id="TglLahir" value ="{{ old('tgl_lahir') }}" placeholder="01-01-1999" required>
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
              <select class="form-select @error('jk') is-invalid @enderror" name="jk" id="JK" aria-label="select example" required>
                <option value="">Choose Level</option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
              </select>
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
              <input type="text" class="form-control @error('kontak') is-invalid @enderror" name="kontak" id="Kontak" value ="{{ old('kontak') }}" placeholder="081344746157" required>
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
                <option value="">Choose Level</option>
                <option value="1">1</option>
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
            <input type="text" class="form-control @error('level_name') is-invalid @enderror" name="level_name" id="NamaLevel" placeholder="Administrator | Kasir" required readonly>
            @error('level_name')
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


<script>
  const level = document.querySelector('#level');
  const NamaLevel = document.querySelector('#NamaLevel');

  level.addEventListener('change', function() {
    var value = level.value;
    if(value === '1') {
      NamaLevel.value = 'Administrator';
    }else{
      NamaLevel.value = '';
    }
  });
 </script>

@endsection