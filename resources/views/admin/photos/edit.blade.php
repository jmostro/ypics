@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="justify-content-center col-md-8 offset-md-2">


			<div class="card mt-2 p-3 ">
				<h2>Editar imagen</h2>
				@if ($message = Session::get('success'))
					<div class="alert alert-success">
						<p>{{ $message }}</p>
					</div>
				@endif
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
				<form action="{{ route('admin.photos.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-group row">
						<div class="form-group">
							<label for="title">Título</label>
							<input type="text" name="title" class="form-control" placeholder="Título" value="{{ $photo->title }}">
						</div>
						<div class="form-group">
							<label for="description">Descripción</label>
							<textarea class="form-control" style="height:150px" name="description"
								placeholder="Descripción">{{ $photo->description }}</textarea>
						</div>
						<div class="form-group">
							<label for="albums">Mostrar en album:</label>
							<select class="form-select" name="albums[]" multiple="multiple">
								@foreach ($albums as $album)
									
									/*
									@if(in_array($album->id, $photo->albums()->pluck('album_id')->toArray()))
										<option value="{{ $album->id }}" selected>{{ $album->title }}</option>
									@else 
										<option value="{{ $album->id }}" >{{ $album->title }}</option>
									@endif
									*/
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="image">Imagen</label>
							<input type="file" name="image" class="form-control" placeholder="image" value="{{ $photo->image }}">
							<div class="col-md-4 p-2 grey">
								<img class="img-thumbnail" src="{{ $photo->getUrl() }}">
							</div>
						</div>

						<div class="form-group mt-2 mb-2">
							<a href="{{ URL::previous() }}"><button type="button" class="btn btn-danger">Cancelar</button></a>
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
					</div> <!-- form-group row -->
				</form>
			</div> <!-- card  -->
		</div> <!-- row justify-content-center -->
	@endsection
