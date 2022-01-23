@extends('layouts.app')
@section('content')
	<div class="container">

		<div class="row justify-content-center">
			<div class="card-header">
				<h2>Agregar nueva imagen</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-primary" href="{{ route('photos.index') }}"> Volver</a>
			</div>
			<div class="card-body">
				@if ($errors->any())
					<div class=" alert alert-danger">
						<strong>Uy!</strong> Hay algunos problemas con tu entrada.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">

						<div class="form-group">
							<strong>Título:</strong>
							<input type="text" name="title" class="form-control" placeholder="Título" value="{{ old('title') }}">
						</div>
						<div class="form-group">
							<strong>Descripción:</strong>
							<textarea class="form-control" style="height:150px" name="detail" placeholder="Descripción" value="{{ old('detail') }}"></textarea>
						</div>
						<div class="form-group">
							<strong>Imagen:</strong>
							<input type="file" name="image" class="form-control" placeholder="image" value="{{ old('image') }}">
						</div>
						<button type="submit" class="btn btn-primary">Agregar</button>
					</div>
			</div>
			</form>
		</div>
	@endsection
