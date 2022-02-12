<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	<div class="container">
		<a class="navbar-brand" href="{{ route('welcome') }}">
			{{ config('app.name', 'Laravel') }}
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!-- Left Side Of Navbar -->
			<ul class="navbar-nav me-auto">
			</ul>
			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ms-auto">
				<a href="{{ route('admin.albums.new') }}"><button type="button" class="btn btn-success">Agregar album</button></a>
				&nbsp;
				<a href="{{ route('admin.photos.new') }}"><button type="button" class="btn btn-success">Agregar foto</button></a>
				<!-- Profile links -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
						aria-expanded="false"><i class="fas fa-user fa-fw"></i>&nbsp; {{ Auth::user()->username }}</a>
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
						<li><a class="dropdown-item" href="#">Mi cuenta</a></li>
						<a class="dropdown-item" href="{{ route('logout') }}"
							onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							Salir
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</ul>
				</li>

			</ul>
		</div>
	</div>
</nav>
