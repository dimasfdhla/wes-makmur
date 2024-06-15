@extends('app')
@section('main')
    <form action="{{ url('produk/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control  @error('nama_produk') is-invalid @enderror" id="exampleFormControlInput1"  value="{{ old('nama_produk') }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control  @error('harga') is-invalid @enderror" id="exampleFormControlInput1"  value="{{ old('harga') }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
            <textarea name="desc_produk" class="form-control  @error('desc_produk') is-invalid @enderror" id="exampleFormControlInput1" >{{ old('desc_produk') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control  @error('foto') is-invalid @enderror" id="exampleFormControlInput1"  value="{{ old('foto') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select  class="custom-select" name="kategori_id" >
                @foreach ($kategori as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
@endsection
