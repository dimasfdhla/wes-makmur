@extends('app')
@section('main')
    <h2>Data Barang</h2>
    <a href="{{ url('produk/create') }}" class="btn btn-primary my-3">Tambah Data</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Foto</th>
                <th scope="col">Harga</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($data))
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->nama_produk }}</td>
                    <td><img style="width: 200px" src="{{ asset('img/' . $item->foto) }}" alt="Foto Produk"></td>
                    <td>Rp {{ $item->harga }}</td>
                    <td>{{ $item->desc_produk }}</td>
                    <td><a href="{{ url('produk/edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <td><form action="{{ url('produk/destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form></td>
                </tr>
            @endforeach
            @endif
        </tbody>
    </table>
@endsection
