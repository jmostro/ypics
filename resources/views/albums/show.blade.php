@extends('layouts.app')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<h1>{{ $album->title }}</h1>
			@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			@endif
			{{ $photos = $album->photos()->paginate(8) }}
			@foreach ($photos as $photo)
				<div class="col-4 m-0 p-1">
					<img src="{{ $photo->getUrl() }}" alt="{{ $photo->title }}" class="card-img-top">
				</div>
			@endforeach
			{{ $photos->links() }}
		</div> <!-- row -->
	</div> <!-- container-fluid -->
@endsection
