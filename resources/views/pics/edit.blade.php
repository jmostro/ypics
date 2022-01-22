@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Editar imagen</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-primary" href="{{ route('pics.index') }}"> Volver</a>
			</div>
		</div>
	</div>
	@if ($errors->any())
		<div class="alert alert-danger">
			<strong>Uy!</strong> Hubo algunos problemas con tu entrada.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<form action="{{ route('pics.update', $pic->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Título:</strong>
					<input type="text" name="title" value="{{ $pic->title }}" class="form-control" placeholder="Título">
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Descripción:</strong>
					<textarea class="form-control" style="height:150px" name="detail"
						placeholder="Descripción">{{ $pic->detail }}</textarea>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Imagen:</strong>
					<input type="file" name="image" class="form-control" placeholder="imagen">
					<img src="/image/{{ $pic->image }}" width="300px">
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Guardar</button>
			</div>
		</div>
	</form>
@endsection
