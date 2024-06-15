@extends('app')
@section('main')
    <h2>Data User</h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($data))
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->role }}</td>
                    <td><a href="{{ url('user/edit', $item->id) }}" class="btn btn-warning">Ubah Role</a></td>
                </tr>
            @endforeach
            @endif
        </tbody>
    </table>
@endsection
