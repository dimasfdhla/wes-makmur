@extends('app')
@section('main')
    <form action="{{ url('kategori/update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror"
                id="exampleFormControlInput1" value="{{ $data->nama_kategori }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
            <textarea name="desc_kategori" class="form-control  @error('desc_kategori') is-invalid @enderror"
                id="exampleFormControlInput1">{{ $data->desc_kategori }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
@endsection
