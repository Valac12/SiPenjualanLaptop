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
           <li class="breadcrumb-item"><a class="fw-light" href="/kelolaStok">Stok</a></li>
           <li class="breadcrumb-item active fw-light" aria-current="page">{{ $tittle }}</li>
         </ol>
       </nav>
     </div>
   </div>

<div class="container-fluid shadow  p-3 mb-5 bg-body-tertiary rounded ">
    <form action="/kelolaStok/{{ $Ebi->id }}" method="post" enctype="multipart/form-data" class="was-validated needs-validation">
      @method('put')
      @csrf
    <div class="row align-items-end mx-2 my-2 g-2">
           <div class="col-5">
            <div class="mb-3">
                <label for="LaptopId" class="col-sm-4 col-form-label">Laptop</label>
                <div class="col-sm-10">
                  <select class="form-select @error('laptop_id') is-invalid @enderror" name="laptop_id" aria-label="select example" required>
                    <option value="{{ $Ebi->laptop_id }}">{{ $Ebi->laptop->nama }}</option>
                    @foreach($laptop as $lp)
                    <option value="{{ $lp->id }}">{{ $lp->nama }}</option>
                    @endforeach
                  </select>
                @error('laptop_id')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="mb-3">
                <label for="JumlahStok" class="col-sm-4 col-form-label">Qty</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control @error('jumlahStok') is-invalid @enderror" name="jumlahStok" id="JumlahStok" value ="{{ old('jumlahStok', $Ebi->jumlahStok) }}"  placeholder="20" required>
                @error('jumlahStok')
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