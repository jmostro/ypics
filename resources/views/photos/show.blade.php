@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			@endif
			<div class="card mt-2 p-3 ">

				<img src="{{ $photo->getUrl() }}" alt="{{ $photo->title }}" class="img-fluid card-img-top">
				<div class="p-4">
					<h5> <a href="#" class="text-dark">{{ $photo->title }}</a></h5>
					<p class="small text-muted mb-0">{{ $photo->description }}</p>					
				</div> <!-- p-4 -->
			</div> <!-- bg-white rounded shadow-sm -->
		</div> <!-- col-xl-3 col-lg-4 col-md-6 mb-4 -->
	</div> <!-- row -->
	</div> <!-- container-fluid -->
@endsection
