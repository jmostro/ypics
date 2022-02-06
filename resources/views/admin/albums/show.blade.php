@extends('layouts.admin')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<h1>{{ $album->title }}</h1>
				@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			@endif
			@foreach ($album->photos as $photo)
				<div class="card col-auto m-0 p-1">
					<img src="{{ $photo->getUrl() }}" class="card-img-top">
					<div class="card-footer">
						<a href="{{route('admin.album.removephoto', ['album' => $album->id, 'photo' => $photo->id])}}"><i class="fas fa-times" title="Eliminar foto del album"></i></a>
						&nbsp;
						<a href="{{ route('admin.photos.edit' , $photo->id)}}"><i class="fas fa-edit" title="Modificar foto"></i></a>
						<br>						
					</div>
				</div>
			@endforeach
		</div>
	</div>

@endsection
