@extends('app')
@section('main')
    <form action="{{ url('post/store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control  @error('judul') is-invalid @enderror" id="exampleFormControlInput1"  value="{{ old('judul') }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Isi</label>
            <textarea name="isi" class="form-control  @error('isi') is-invalid @enderror" id="exampleFormControlInput1" >{{ old('isi') }}</textarea>
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
