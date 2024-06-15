@extends('app')
@section('main')
    <h3>Artikel</h3>

    <div class="row mt-4">
    	@if(!empty($data))
    	@foreach ($data as $post)
    	<div class="col-md-6 mb-4">
    		<div class="card">
    			<div class="card-body">
    				<h5 class="card-title">{{ $post->judul }}</h5>
    				<h6 class="card-subtitle mb-2 text-muted">{{ $post->Kategori->nama_kategori }}</h6>
    				<p class="card-text">{{ Str::limit($post->isi, 150, '...') }}</p>
    				<a href="{{ url('detail_artikel', $post->id) }}" class="btn btn-primary" >
    					Selengkapnya
    				</a>
    			</div>
    		</div>
    	</div>
    	@endforeach
    	@endif
    </div>
@endsection