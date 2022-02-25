<div class="card col-auto p-1">
	<img src="{{ $photo->getUrl() }}" class="card-img-top">
	<div class="card-footer">
		<a href="{{ route('admin.photos.delete', $photo->id) }}"><i class="fas fa-times"
				title="Eliminar foto del sitio"></i></a>
		&nbsp;
		<a href="{{ route('admin.photos.edit', $photo->id) }}"><i class="fas fa-edit" title="Modificar foto"></i></a>
		<br>
	</div>
</div>
