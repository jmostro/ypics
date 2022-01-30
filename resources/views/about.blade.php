@extends('layouts.app')
@section('content')

	<div class="container-fluid">
		<h1>Sobre mí</h1>
		<div class="row">
			@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			@endif
		
		</div> <!-- row -->		
		</div> <!-- py-5 text-right -->
	</div> <!-- container-fluid -->	
	
@endsection
