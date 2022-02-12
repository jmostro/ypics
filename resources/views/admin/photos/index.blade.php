@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<h1>Fotos</h1>
			@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			@endif
			@foreach ($photos as $photo)
				<div class="card col-auto p-1">
					<img src="{{ $photo->getUrl() }}" class="card-img-top">
					<div class="card-footer">
						<a href="{{ route('admin.photos.delete', $photo->id) }}"><i class="fas fa-times"
								title="Eliminar foto del sitio"></i></a>
						&nbsp;
						<a href="{{ route('admin.photos.edit', $photo->id) }}"><i class="fas fa-edit" title="Modificar foto"></i></a>
						<br>
						@if ($photo->albums->count() > 0)
							<span>(en {{ $photo->albums->count() }} albums)</span>
						@else
							<span>(sin album)</span>
						@endif
					</div>
				</div>
			@endforeach		
		</div>

	</div>
	<div class="pagination justify-content-center mt-3">
		{{ $photos->links() }}
	</div>
@endsection
