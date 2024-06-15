@extends('app')
@section('main')
    <form action="{{ url('produk/update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control  @error('nama_produk') is-invalid @enderror" id="exampleFormControlInput1"  value="{{ $data->nama_produk }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control  @error('harga') is-invalid @enderror" id="exampleFormControlInput1"  value="{{ $data->harga }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
            <textarea name="desc_produk" class="form-control  @error('desc_produk') is-invalid @enderror" id="exampleFormControlInput1" >{{ $data->desc_produk }}</textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control  @error('foto') is-invalid @enderror" id="exampleFormControlInput1"  value="{{ $data->foto }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select  class="custom-select"  name="kategori_id">
                @foreach ($kategori as $item)
                    <option value="{{ $item->id }}" @selected($data->kategori_id == $item->id)>{{ $item->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
@endsection
