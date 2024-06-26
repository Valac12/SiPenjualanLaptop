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

<div class="container shadow-sm p-3 mb-5 bg-body rounded mt-2 py-2">
    <div class="container-fluid p-2">
        <form action="/invoice" method="get">
            @csrf
            <div class="row justify-content-md-center g-3 d-flex">
                <div class="col-auto ">
                    <label for="Pelanggan" class="form-label">Pelanggan</label>
                    <select class="form-select" id="SelectNopol" name="nama" aria-label="Default select example" required>
                        <option value="">Choose Menu</option>
                       @foreach($pelanggan as $plg)
                        <option value="{{ $plg->nama }}">{{ $plg->nama }}</option>
                        @endforeach
                      </select>
                </div>
                 <div class="col-auto align-self-center mt-4">
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Buat invoice?')">Buat Invoice</button>
                 </div>
            </div>
        </form>
    </div>
</div>

<div class="container-fluid mt-2">
  <div class="card-body">
    <table class="table row-bordered" style="width: 100%" id="tablePrint">
      <thead>
        <tr class="table-secondary">
          <th>No</th>
          <th>Nama</th>
          <th>Kontak</th>
          <th>Alamat</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
        <tbody>
          @foreach($pelanggans as $p)
            <tr>
               <td>{{ $loop->iteration }}</td>
               <td>{{ $p->nama }}</td>
               <td>{{ $p->kontak }}</td>
               <td>{{ $p->alamat }}</td>
               <td>{{ $p->email }}</td>
                <td>
                  <a class="badge bg-primary border-0 m-1" href="/invoicePelanggan/">
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                          <use xlink:href="#document-saved-1"> </use>
                      </svg>
                  </a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </thead>
    </table>
  </div>
</div>
  


@endsection