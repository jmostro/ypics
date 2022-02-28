@extends('layouts.admin')
@section('content')
@push('view-scripts')
<script src="{{ asset('/js/editphoto.js') }}" defer></script>
@endpush
	<div class="container-fluid">
		<div class="row">
			<h1>{{ $album->title }}</h1>
				@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			@endif
			@foreach ($album->photos as $photo)
				@include('admin.partials.photo')
			@endforeach
			<input id="csrf_token" type="hidden" value="{{ csrf_token() }}">
		</div>
	</div>
@endsection
