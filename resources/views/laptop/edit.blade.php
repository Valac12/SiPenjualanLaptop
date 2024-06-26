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
           <li class="breadcrumb-item"><a class="fw-light" href="/kelolaLaptop">Laptop</a></li>
           <li class="breadcrumb-item active fw-light" aria-current="page">{{ $tittle }}</li>
         </ol>
       </nav>
     </div>
   </div>

<div class="container-fluid shadow  p-3 mb-5 bg-body-tertiary rounded ">
    <form action="/kelolaLaptop/{{ $Ebi->id }}" method="post" enctype="multipart/form-data" class="was-validated needs-validation">
      @method('put')
      @csrf
    <div class="row align-items-end mx-2 my-2 g-2">

        <div class="col-3">
            <div class="mb-3">
                <label for="Nama" class="col-sm-6 col-form-label">Nama</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="Nama" value ="{{ old('nama', $Ebi->nama) }}"  placeholder="Macbook pro" required>
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
                <label for="Merek" class="col-sm-6 col-form-label">Merek</label>
                <div class="col-sm-10">
                <input type="text" class="form-control @error('merek') is-invalid @enderror" name="merek" id="Merek" value ="{{ old('merek',$Ebi->merek) }}"  placeholder="asus/acer.." required>
                @error('merek')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="mb-3">
                <label for="Prosesor" class="col-sm-6 col-form-label">Prosesor</label>
                <div class="col-sm-10">
                <input type="text" class="form-control @error('prosesor') is-invalid @enderror" name="prosesor" id="Prosesor" value ="{{ old('prosesor', $Ebi->prosesor) }}"  placeholder="intel/amd.." required>
                @error('prosesor')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        </div>

           <div class="col-3">
            <div class="mb-3">
                <label for="Ram" class="col-sm-4 col-form-label">Ram</label>
                <div class="col-sm-10">
                  <select class="form-select @error('ram') is-invalid @enderror" name="ram" aria-label="select example" required>
                    <option value="{{ $Ebi->ram }}">{{ $Ebi->ram }}</option>
                    <option value="4GB">4GB</option>
                    <option value="8GB">8GB</option>
                    <option value="16GB">16GB</option>
                    <option value="32GB">32GB</option>
                    <option value="64GB">64GB</option>
                  </select>
                @error('ram')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="mb-3">
                <label for="Penyimpanan" class="col-sm-4 col-form-label">Penyimpanan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('penyimpanan') is-invalid @enderror" name="penyimpanan" id="Penyimpanan" value ="{{ old('penyimpanan', $Ebi->penyimpanan) }}"  placeholder="1T SSD" required>
                @error('penyimpanan')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        </div>
        
        <div class="col-3">
            <div class="mb-3">
               <label for="Layar" class="col-sm-2 col-form-label">Layar</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="layar" id="Layar" value ="{{ old('layar', $Ebi->layar) }}"  placeholder="1T SSD" required>
                @error('layar')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        </div>
        
        <div class="col-3">
            <div class="mb-3">
               <label for="Harga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="harga" id="Harga" value ="{{ old('harga', $Ebi->harga) }}"  placeholder="Rp. 999.999" required>
                @error('harga')
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