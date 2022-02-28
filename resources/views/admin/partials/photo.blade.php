<div id="photoCard_{{ $photo->id }}" class="card col-auto p-1 photo-thumb">
    <div class="">
        <img src="{{ $photo->getUrl() }}" class="card-img-top">
    </div>
    <div class="card-footer">
        <div id="viewDetails_{{ $photo->id }}">
            <span><b id="viewTitle_{{ $photo->id }}">{{ $photo->title }}</b></span>
            <span id="viewDescription_{{ $photo->id }}">{{ $photo->description }}</span>
            <div class="mt-2">
			<div id="viewOptions_{{ $photo->id }}">
                <a href="#" onclick="confirmDelete({{ $photo->id }})"><i class="fas fa-times fa-lg"
                        title="Eliminar foto"></i></a>
						
                <a href="#" onClick="editPhoto({{ $photo->id }})"><i class="fas fa-edit fa-lg" title="Modificar foto"></i></a>
				</div>
				<div id="deleteOptions_{{ $photo->id }}" style="display:none">
					<span>¿Eliminar la imagen?</span>
					<a href="#" onClick="confirmDelete({{ $photo->id }})"><i class="fas fa-rotate-left fa-lg" title="Cancelar"></i></a>
					<a href="#" onClick="doDelete('{{ route('admin.photos.delete', $photo->id) }}', {{ $photo->id }})"><i class="fas fa-trash fa-lg" title="Eliminar"></i></a>
				</div>
				
			</div>
			
        </div>
        <div id="editDetails_{{ $photo->id }}" style="display:none">
            <form id="editForm_{{ $photo->id }}" action="{{ route('admin.photos.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input id="editTitle_{{ $photo->id }}" type="text" name="title" class="form-control" placeholder="Título"
                            value="{{ $photo->title }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea id="editDescription_{{ $photo->id }}" class="form-control" name="description"
                            placeholder="Descripción">{{ $photo->description }}</textarea>
                    </div>
                    <div class="mt-2">
                        <a href="#" onclick="editPhoto({{ $photo->id }})"><i class="fas fa-rotate-left fa-lg" title="Cancelar"></i></a>
						<a href="#" onclick="updatePhoto({{ $photo->id }})"><i class="fas fa-save fa-lg" title="Guardar cambios"></i></a>
					</div>
                </div> <!-- form-group row -->
            </form>
        </div>
    </div>
</div>
