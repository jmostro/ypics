<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }}</title>
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body>
		@include('includes/admin/navbar')
		<div class="row flex-nowrap ">
			@include('includes/admin/sidebar')
			<div class="col-auto">
				<main class="flex-fill min-vh-100">
					@yield('content')
				</main>

				<footer>
					<div class="container-fluid p-4">
						<div class="d-flex align-items-center justify-content-between small">
							<div class="text-muted">Copyright &copy; Yosefin Pics 2022</div>
							<div class="text-muted">
								Desarrollado por
								<a href="http://github.com/jmostro" target="_blank">Javier Mondini</a>
							</div>
						</div>
					</div>
				</footer>
			</div>
		</div>
	
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

</html>
