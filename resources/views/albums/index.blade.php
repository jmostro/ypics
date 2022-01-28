@extends('layouts.app')
@section('content')

	<div class="container-fluid">
		<div class="row">
			@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			@endif
			@foreach ($albums as $album)				
				<div class="col-xl-3 col-lg-4 col-md-6 mb-4">
					<div class="bg-white rounded shadow-sm">
						<a href="{{ route('albums.show', $album->id) }}" class="text-dark">
						<img src="{{ $album->getCoverUrl() }}" alt="{{ $album->title }}" class="card-img-top">
						<div class="p-4">
							<h5> assad s{{ $album->title }}</h5></a>
							<p class="small text-muted mb-0">{{ $album->description }}</p>				
						</div> <!-- p-4 -->
					</div> <!-- bg-white rounded shadow-sm -->
				</div> <!-- col-xl-3 col-lg-4 col-md-6 mb-4 -->

			@endforeach
			{{ $albums->links() }}		
		</div> <!-- row -->
		
		<div class="py-5 text-right">
			<a href="{{ route('photos.create') }}" class="btn btn-dark px-5 py-3 text-uppercase">Agregar imagen</a>
		</div> <!-- py-5 text-right -->
	</div> <!-- container-fluid -->	
	
@endsection
