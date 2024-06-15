@extends('app')
@section('main')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title mb-4">{{$data->judul}}</h3>
            <h6 class="card-subtitle mb-4 text-muted">Kategori : {{$data->Kategori->nama_kategori}}</h6>
            <p class="card-text">{{$data->isi}}.</p>
            <p class="card-text">Tanggal Dibuat : {{$data->created_at}}</p>
        </div>
    </div>

    <div class="mt-4">
        <h4>Produk Serupa</h4>
        <div class="row">
            @if(!empty($produk))
            @foreach($produk as $item)
            <div class="col-md-3 mb-4">
                <a href="{{ url('detail_produk', $item->id)}}" class="text-decoration-none text-dark">
                    <div class="card">
                        <img src="{{ asset('img/'. $item->foto) }}" class="card-img-top" alt="Foto Produk">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->nama_produk}}</h5>
                            <p class="card-text">{{$item->desc_produk}}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection