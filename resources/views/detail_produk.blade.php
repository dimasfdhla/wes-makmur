@extends('app')
@section('main')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
             <img style="width: 200px" src="{{ asset('img/'. $data->foto) }}" class="img-fluid mb-4" alt="Foto Produk">
            <h4 class="card-title mb-4">{{$data->nama_produk}}</h4>
            <h6 class="card-subtitle mb-4 text-muted">Harga : Rp {{$data->harga}}</h6>
            <p class="card-text">{{$data->desc_produk}}.</p>
        </div>
    </div>

</div>
@endsection