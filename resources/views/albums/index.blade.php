@extends('layouts.app')
@section('content')

	<div class="container-fluid">
		<h1>Portafolio</h1>
		<div class="row">
			@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			@endif
			@foreach ($albums as $album)				
				<div class="col-4 mb-4">
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
		</div> <!-- py-5 text-right -->
	</div> <!-- container-fluid -->	
	
@endsection
