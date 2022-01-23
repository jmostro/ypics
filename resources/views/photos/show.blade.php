@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2> Ver imagen</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-primary" href="{{ route('photos.index') }}"> Volver</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Name:</strong>
				{{ $photo->name }}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Details:</strong>
				{{ $photo->detail }}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Image:</strong>
				<img src="{{ $photo->getUrl() }}" width="500px">
			</div>
		</div>
	</div>
@endsection
