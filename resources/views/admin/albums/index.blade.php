@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<h1>Albums</h1>
			@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			@endif
			@foreach ($albums as $album)
				<div class="card col-auto p-0 m-1">
					<div class="card-body p-0">
						<a href="{{ route('admin.albums.show', $album->id) }}">
							<img src="{{ $album->getCoverUrl() }}" class="card-img-top">						
						<div class="photo-label">
							{{ $album->title }}
						</div>
						</a>
					</div>
					<div class="card-footer">
						<a href="{{ route('admin.albums.delete', $album->id) }}"><i class="fas fa-times" title="Eliminar album"></i></a>
						&nbsp;
						<a href="{{ route('admin.albums.edit', $album->id) }}"><i class="fas fa-edit" title="Editar album"></i></a>
						<br>
						@if ($album->photos->count() > 0)
							<span>({{ $album->photos->count() }} fotos)</span>
						@else
							<span><b>(sin fotos)</b></span>
						@endif
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection
