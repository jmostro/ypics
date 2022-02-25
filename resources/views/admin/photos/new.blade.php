@extends('layouts.admin')
@section('content')
	<div class="container fluid">
		<div class="justify-content-center col-md-8 col-lg-8 offset-md-2 pt-4">
			<h2>Agregar imágenes</h2>
			<div class="">
				<form action="{{ route('admin.photos.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
						<input type="text" class="form-control" hidden name="title[]" placeholder="Título">
						<textarea class="form-control" hidden name="description[]" placeholder="Descripción"></textarea>
						<input type="file" hidden name="images[]" id="images" class="form-control" placeholder="image">		
					</div> <!-- form-group row -->
					<i id="addPhotoBtn" class="fa-solid fa-plus fa-10x"></i>
				</form>
			</div> <!-- card  -->
		</div> <!-- row justify-content-center -->
		@push('view-scripts')
		<script src="{{ asset('/js/newphoto.js') }}" defer></script>
		@endpush
	@endsection
