<div class="card mt-2 p-3 col-md-3">
	<form action="{{ route('admin.photos.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="form-group row">
			<div class="col-md-4 p-2 grey">
				<img class="img-thumbnail" src="{{ old('image[]') }}">
			</div>
			<div class="form-group">
				<label for="title">Título</label>
				<input type="text" name="title[]" class="form-control" placeholder="Título" value="{{ old('title[]') }}">
			</div>
			<div class="form-group">
				<label for="description">Descripción</label>
				<textarea class="form-control" style="height:150px" name="description[]" placeholder="Descripción">{{ old('description[]') }}</textarea>
			</div>
			<div class="form-group">
				<label for="albums">Mostrar en album:</label>
				<select class="form-select" name="albums[]" multiple="multiple">
					@foreach ($albums as $album)
					<option value="{{ $album->id }}">{{ $album->title }}</option>
					@endforeach
				</select>
			</div>

			<div class="mt-2">
				<a href="#"><i class="fas fa-save" title="Guardar cambios"></i></a>
				<a href="{{ URL::previous() }}"><i class="fas fa-trash" title="Borrar foto"></i></a>
			</div>
			<div class="images-preview-div">
			</div>
			<input type="hidden" name="image[]" class="form-control" placeholder="image" id="image" value="{{ old('image[]') }}">
		</div> <!-- form-group row -->
	</form>
</div> <!-- card  -->