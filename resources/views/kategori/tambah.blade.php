@extends('app')
@section('main')
    <form action="{{ url('kategori/store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control  @error('nama_kategori') is-invalid @enderror" id="exampleFormControlInput1"  value="{{ old('nama_kategori') }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
            <textarea name="desc_kategori" class="form-control  @error('desc_kategori') is-invalid @enderror" id="exampleFormControlInput1" >{{ old('desc_kategori') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
@endsection
