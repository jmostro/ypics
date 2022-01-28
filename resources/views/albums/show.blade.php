@extends('layouts.app')
@section('content')
	<div class="container-fluid">
		<div class="row">
			@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			@endif
			
			@foreach ($photos as $photo)				
				
				<div class="col-xl-3 col-lg-4 col-md-6 mb-4">
					<div class="bg-white rounded shadow-sm">
					<a href="{{ route('photos.show', $photo->id) }}" class="text-dark">
						<img src="{{ $photo->getUrl() }}" alt="{{ $photo->title }}" class="card-img-top">
						<div class="p-4">
							<h5> {{ $photo->title }}</h5></a>
							<p class="small text-muted mb-0">{{ $photo->description }}</p>							
						</div> <!-- p-4 -->
					</div> <!-- bg-white rounded shadow-sm -->
				</div> <!-- col-xl-3 col-lg-4 col-md-6 mb-4 -->
			@endforeach
			{{ $photos->links() }}		
		</div> <!-- row -->				
	</div> <!-- container-fluid -->
@endsection
