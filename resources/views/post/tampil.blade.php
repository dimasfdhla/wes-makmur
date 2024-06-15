@extends('app')
@section('main')
    <h2>Data Artikel</h2>
    <a href="{{ url('post/create') }}" class="btn btn-primary my-3">Tambah Data</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Isi</th>
                <th scope="col">Aksi</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($data))
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->isi }}</td>
                    <td><a href="{{ url('post/edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <td><form action="{{ url('post/destroy', $item->id) }}" method="POST">
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
