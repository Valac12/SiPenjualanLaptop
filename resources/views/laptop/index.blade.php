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
 @if(session()->has('successCreateLaptop'))
 <div class="container-fluid py-2">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('successCreateLaptop') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif
  {{-- alert data berhasil diupdate --}}
 @if(session()->has('successUpLaptop'))
 <div class="container-fluid py-2">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('successUpLaptop') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif
  {{-- alert berhasil dihapus --}}
  @if(session()->has('successDelLaptop'))
  <div class="container-fluid py-2">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('successDelLaptop') }}
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
    <button class="btn btn-primary btn-md border-3" type="button" title="Tambah Data" data-bs-toggle="modal" data-bs-target="#modalLaptop">+Tambah Data</button>
  </div>
  <div class="card-body py-2">
  <table id="example" class="row-border" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Merek</th>
                <th>Prosesor</th>
                <th>Ram</th>
                <th>Penyimpanan</th>
                <th>Layar</th>
                <th>Harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($laptop as $lp)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $lp->nama }}</td>
                <td>{{ $lp->merek }}</td>
                <td>{{ $lp->prosesor }}</td>
                <td>{{ $lp->ram }}</td>
                <td>{{ $lp->penyimpanan }}</td>
                <td>{{ $lp->layar }}</td>
                <td>Rp.{{ number_format($lp->harga, 0, ',', '.') }}</td>
                <td>
                  <a class="badge bg-warning border-0 m-1" href="/kelolaLaptop/{{ $lp->id }}">
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                          <use xlink:href="#eye-1"> </use>
                      </svg>
                  </a>
                    <form action="/kelolaLaptop/{{ $lp->id }}" method="post" class="d-inline">
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
<div class="modal fade" id="modalLaptop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data {{ $tittle }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/kelolaLaptop" method="post" class="was-validated needs-validation" novalidate>
            @csrf
            <div class="mb-3 row postition-relative">
              <label for="Nama" class="col-sm-2 col-form-label">Nama Laptop</label>
              <div class="col-sm-10">
              <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="Nama" placeholder="Macbook Pro" value ="{{ old('nama') }}" autofocus required>
              @error('nama')
              <div class="invalid-feedback ">
                {{ $message }}
              </div>
              @enderror
              </div>
          </div>
          <div class="mb-3 row postition-relative">
              <label for="Merek" class="col-sm-2 col-form-label">Merek</label>
              <div class="col-sm-10">
              <input type="text" class="form-control @error('merek') is-invalid @enderror" name="merek" id="Merek" value ="{{ old('merek') }}" placeholder="asus/acer.." required>
              @error('merek')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              </div>
          </div>
          <div class="mb-3 row position-relative">
              <label for="Prosesor" class="col-sm-2 col-form-label">Prosesor</label>
              <div class="col-sm-10">
              <input type="text" class="form-control @error('prosesor') is-invalid @enderror" name="prosesor" id="Prosesor"  value ="{{ old('prosesor') }}" placeholder="intel/amd.." required>
              @error('prosesor')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              </div>
          </div>
          <div class="mb-3 row postition-relative">
            <label for="Ram" class="col-sm-2 col-form-label">Ram</label>
            <div class="col-sm-10">
              <select class="form-select @error('ram') is-invalid @enderror" name="ram" id="Ram" aria-label="select example" required>
                <option value="">Choose Level</option>
                <option value="4GB">4GB</option>
                <option value="8GB">8GB</option>
                <option value="16GB">16GB</option>
                <option value="32GB">32GB</option>
                <option value="64GB">64GB</option>
              </select>
              @error('ram')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          <div class="mb-3 row position-relative">
              <label for="Penyimpanan" class="col-sm-2 col-form-label">Penyimpanan</label>
              <div class="col-sm-10">
              <input type="text" class="form-control @error('penyimpanan') is-invalid @enderror" name="penyimpanan" id="Penyimpanan"  value ="{{ old('penyimpanan') }}" placeholder="1T SSD" required>
              @error('penyimpanan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              </div>
          </div>
          <div class="mb-3 row position-relative">
              <label for="Layar" class="col-sm-2 col-form-label">Layar</label>
              <div class="col-sm-10">
              <input type="text" class="form-control @error('layar') is-invalid @enderror" name="layar" id="Layar"  value ="{{ old('layar') }}" placeholder="1T SSD" required>
              @error('layar')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              </div>
          </div>
          <div class="mb-3 row position-relative">
              <label for="Harga" class="col-sm-2 col-form-label">Harga</label>
              <div class="col-sm-10">
              <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga"  pattern="/^-?\d+\.?\d*$/" id="Harga"  value ="{{ old('harga') }}" placeholder="Rp.999,999" required>
              @error('harga')
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