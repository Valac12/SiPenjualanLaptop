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
 @if(session()->has('successCreateStok'))
 <div class="container-fluid py-2">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('successCreateStok') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif
  {{-- alert data berhasil diupdate --}}
 @if(session()->has('successUpStok'))
 <div class="container-fluid py-2">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('successUpStok') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif
  {{-- alert berhasil dihapus --}}
  @if(session()->has('successDelStok'))
  <div class="container-fluid py-2">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('successDelStok') }}
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
    <button class="btn btn-primary btn-md border-3" type="button" title="Tambah Data" data-bs-toggle="modal" data-bs-target="#modalStok">+Tambah Data</button>
  </div>
  <div class="card-body py-2">
  <table id="example" class="row-border" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Merek</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($stoks as $st)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $st->laptop->nama }}</td>
                <td>{{ $st->laptop->merek }}</td>
                <td>{{ $st->laptop->harga }}</td>
                <td>{{ $st->jumlahStok }}</td>
                <td>
                  <a class="badge bg-warning border-0 m-1" href="/kelolaStok/{{ $st->id }}">
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                          <use xlink:href="#eye-1"> </use>
                      </svg>
                  </a>
                    <form action="/kelolaStok/{{ $st->id }}" method="post" class="d-inline">
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
          </table>
 </div>
 </div>

 
<!-- Modal Create -->
<div class="modal fade" id="modalStok" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data {{ $tittle }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/kelolaStok" method="post" class="was-validated needs-validation" novalidate>
            @csrf
            <div class="mb-3 row postition-relative">
              <label for="LaptopID" class="col-sm-2 col-form-label">Laptop</label>
              <div class="col-sm-10">
                <select class="form-select @error('laptop_id') is-invalid @enderror" name="laptop_id" id="LaptopID" aria-label="select example" required>
                  <option value="">Choose Laptop</option>
                  @foreach($laptop as $lp)
                  <option value="{{ $lp->id }}">{{ $lp->nama }}</option>
                  @endforeach
                </select>
                @error('laptop_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="mb-3 row postition-relative">
              <label for="JumlahStok" class="col-sm-2 col-form-label">Qty</label>
              <div class="col-sm-10">
              <input type="number" class="form-control @error('jumlahStok') is-invalid @enderror" name="jumlahStok" id="JumlahStok" placeholder="20" value ="{{ old('jumlahStok') }}" autofocus required>
              @error('jumlahStok')
              <div class="invalid-feedback ">
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



{{-- <script>
  const cekOnline = document.getElementById('cekOnline');
  const cek = cekOnline.innerText;
  if( cek === 'Online' ) {
    cekOnline.classList.remove('bg-danger');
    cekOnline.classList.add('bg-success');
  }
</script> --}}

@endsection