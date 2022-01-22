@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Ypics</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-success" href="{{ route('pics.create') }}"> Crear nueva imagen</a>
			</div>
		</div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th>No.</th>
			<th>Imagen</th>
			<th>Título</th>
			<th>Descripción</th>
			<th width="280px">Accion</th>
		</tr>
		@foreach ($pics as $pic)
			<tr>
				<td>{{ ++$i }}</td>
				<td><img src="/image/{{ $pic->image }}" width="100px"></td>
				<td>{{ $pic->name }}</td>
				<td>{{ $pic->detail }}</td>
				<td>
					<form action="{{ route('pics.destroy', $pic->id) }}" method="POST">
						<a class="btn btn-info" href="{{ route('pics.show', $pic->id) }}">Ver</a>
						<a class="btn btn-primary" href="{{ route('pics.edit', $pic->id) }}">Editar</a>
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger">Borrar</button>
					</form>
				</td>
			</tr>
		@endforeach
	</table>
	{!! $pics->links() !!}
@endsection
