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
						<img src="{{ $photo->getUrl() }}" alt="{{ $photo->title }}" class="img-fluid card-img-top">
						<div class="p-4">
							<h5> <a href="#" class="text-dark">{{ $photo->title }}</a></h5>
							<p class="small text-muted mb-0">{{ $photo->detail }}</p>
							<div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
								<form action="{{ route('photos.destroy', $photo->id) }}" method="POST">
									<a class="btn btn-info" href="{{ route('photos.show', $photo->id) }}">Ver</a>
									<a class="btn btn-primary" href="{{ route('photos.edit', $photo->id) }}">Editar</a>
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger">Borrar</button>
								</form>
							</div> <!-- d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4 -->
						</div> <!-- p-4 -->
					</div> <!-- bg-white rounded shadow-sm -->
				</div> <!-- col-xl-3 col-lg-4 col-md-6 mb-4 -->

			@endforeach
			{!! $photos->links() !!}
		</div> <!-- row -->
		<div class="py-5 text-right">
			<a href="{{ route('photos.create') }}" class="btn btn-dark px-5 py-3 text-uppercase">Agregar imagen</a>
		</div> <!-- py-5 text-right -->
	</div> <!-- container-fluid -->	
@endsection
