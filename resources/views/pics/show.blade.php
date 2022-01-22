@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2> Ver imagen</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-primary" href="{{ route('pics.index') }}"> Volver</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Name:</strong>
				{{ $pic->name }}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Details:</strong>
				{{ $pic->detail }}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Image:</strong>
				<img src="/image/{{ $pic->image }}" width="500px">
			</div>
		</div>
	</div>
@endsection