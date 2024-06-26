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
 @if(session()->has('successCreateOrder'))
 <div class="container-fluid py-2">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('successCreateOrder') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif
  {{-- alert data berhasil diupdate --}}
 @if(session()->has('successUpOrder'))
 <div class="container-fluid py-2">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('successUpOrder') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif
  {{-- alert berhasil dihapus --}}
  @if(session()->has('successDelOrder'))
  <div class="container-fluid py-2">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('successDelOrder') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif
  {{-- alert stok tidak cukup --}}
  @if(session()->has('FaillCreateOrder'))
  <div class="container-fluid py-2">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('FaillCreateOrder') }}
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
    <button class="btn btn-primary btn-md border-3" type="button" title="Tambah Data" data-bs-toggle="modal" data-bs-target="#modalOrder">+Tambah Data</button>
  </div>
  <div class="card-body py-2">
  <table id="example" class="row-border" style="width:100%">
        <thead>
            <tr>
                <th>ID Order</th>
                <th>Nama Pelanggan</th>
                <th>Date</th>
                <th>Qty</th>
                <th>Jumlah</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach($orders as $order)
            <tr>
               <td>{{ $order->id }}</td>
               <td>{{ $order->pelanggan->nama}}</td>
               <td>{{ $order->date }}</td>
               <td>{{ $order->Qty }}</td>
               <td>Rp. {{ number_format($order->total, 0, ',', '.') }}</td>
                <td>
                  <a class="badge bg-primary border-0 m-1" href="/order/{{ $order->id }}">
                      <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                          <use xlink:href="#document-saved-1"> </use>
                      </svg>
                  </a>
                   <form action="/order/{{ $order->pelanggan_id }}" method="post" class="d-inline">
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
<div class="modal fade" id="modalOrder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data {{ $tittle }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/order" method="post" class="was-validated needs-validation" novalidate>
            @csrf
            <div class="mb-3 row postition-relative">
              <label for="PelangganID" class="col-sm-2 col-form-label">Pelanggan</label>
              <div class="col-sm-10">
                <select class="form-select @error('pelanggan_id') is-invalid @enderror" name="pelanggan_id" id="SelectPelanggan" aria-label="Default select example" required>
                  <option value="">Choose Pelanggan</option>
                  @foreach($pelanggan as $plg)
                  <option value="{{ $plg->id }}">{{ $plg->nama }}</option>
                  @endforeach
                </select>
                @error('pelanggan_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
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
                <label for="Date" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('date') is-invalid @enderror" name="date" id="Date" value ="{{ $carbon }}" autofocus required>
                    @error('date')
                    <div class="invalid-feedback ">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row postition-relative">
                <label for="Qty" class="col-sm-2 col-form-label">Qty</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('Qty') is-invalid @enderror" name="Qty" id="Qty" value ="1" autofocus required>
                    @error('Qty')
                    <div class="invalid-feedback ">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
              <div class="mb-3 row postition-relative">
              <label for="Harga" class="col-sm-2 col-form-label">Harga</label>
              <div class="col-sm-10">
                <select class="form-select @error('harga') is-invalid @enderror" name="harga" id="Harga" aria-label="select example" required>
                  <option value="">Choose Pelanggan</option>
                  @foreach($laptop as $lp)
                  <option value="{{ $lp->harga }}">{{ $lp->harga }} - {{ $lp->nama }}</option>
                  @endforeach
                </select>
                @error('pelanggan_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="mb-3 row postition-relative">
              <label for="Total" class="col-sm-2 col-form-label">Total</label>
              <div class="col-sm-10">
              <input type="number" class="form-control @error('total') is-invalid @enderror" name="total" id="Total" placeholder="8889899" value ="" autofocus required>
              @error('Qty')
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

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const qtyField = document.getElementById('Qty');
    const hargaField = document.getElementById('Harga');
    const totalField = document.getElementById('Total');

    function calculateTotal() {
      const qty = parseFloat(qtyField.value) || 0;
      const harga = parseFloat(hargaField.value) || 0;
      const total = qty * harga;
      totalField.value = total.toFixed(2);
    }

    qtyField.addEventListener('input', calculateTotal);
    hargaField.addEventListener('input', calculateTotal);
  });
</script>



@endsection