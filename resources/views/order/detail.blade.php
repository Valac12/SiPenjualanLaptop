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
   <div class="container-fluid d-flex justify-content-between align-items-center">
     <nav aria-label="breadcrumb">
       <ol class="breadcrumb mb-0 py-3">
         <li class="breadcrumb-item"><a class="fw-light" href="/order">Order</a></li>
         <li class="breadcrumb-item active fw-light" aria-current="page">{{ $tittle }}</li>
       </ol>
     </nav>
     <a href="/invoice/{{ $orderDetail->id }}" class="btn btn-primary">Buat Invoice</a>
   </div>
 </div>

 <div class="row shadow p-3 mb-2 bg-body rounded">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Order Details</h5>
                <hr>
                <p><strong>Order Id:</strong> {{ $orderDetail->id }}</p>
                <p><strong>Ordered Date:</strong> {{ $orderDetail->date }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pelanggan Details</h5>
                <hr>
                <p><strong>Full Name:</strong> {{ $orderDetail->pelanggan->nama }}</p>
                <p><strong>Email:</strong> {{ $orderDetail->pelanggan->email }}</p>
                <p><strong>Kontak:</strong> {{ $orderDetail->pelanggan->kontak }}</p>
                <p><strong>Alamat:</strong> {{ $orderDetail->pelanggan->email }}</p>
            </div>
        </div>
    </div>
</div>

    <div class="mx-2">
        <h5>Order Items</h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Product</th>
                    <th>Harga</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderPelanggan as $op)
                <tr>
                    <td>{{ $op->laptop->id }}</td>
                    <td>{{ $op->laptop->nama }}</td>
                    <td>Rp. {{ number_format($op->laptop->harga, 0, ',', '.') }}</td>
                    <td>{{ $op->Qty }}</td>
                    <td>Rp. {{ number_format($op->total, 0, ',', '.') }}</td>
                    <td>
                     <form action="/orderDetail/{{ $op->id }}" method="post" class="d-inline">
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



@endsection