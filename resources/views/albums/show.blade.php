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
			{{ $photos = $album->photos()->paginate(5) }}
			@foreach ($photos as $photo)

				<div class="col-xl-3 col-lg-4 col-md-6 mb-4">
					<div class="bg-white rounded shadow-sm">
						
							<img src="{{ $photo->getUrl() }}" alt="{{ $photo->title }}" class="card-img-top">
							<div class="p-4">							
								<h5> {{ $photo->title }}</h5>
						
						<p class="small text-muted mb-0">{{ $photo->description }}</p>
					</div> <!-- p-4 -->
				</div> <!-- bg-white rounded shadow-sm -->
		</div> <!-- col-xl-3 col-lg-4 col-md-6 mb-4 -->
		@endforeach
		{{ $photos->links() }}
	</div> <!-- row -->
	</div> <!-- container-fluid -->
@endsection
