@extends('app')
@section('main')
    <form action="{{ url('user/update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" class="form-control" value="{{ $data->name }}" disabled>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <textarea class="form-control" id="exampleFormControlInput1" disabled>{{ $data->email }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Role</label>
            <select  class="custom-select"  name="role">
                @php $role = ['admin','editor','user']; @endphp
                @foreach ($role as $item)
                    <option value="{{ $item }}" @selected($data->role == $item)>{{ $item }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
@endsection
