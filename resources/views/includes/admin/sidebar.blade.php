<nav class="col-auto p-2 bg-dark">
	<div class="align-items-center align-items-sm-start px-3 pt-4">	
		<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start " id="menu">
			<li class="nav-item">
				<a class="nav-link px-0 align-middle link-light" href="{{ route('admin.dashboard') }}">
					<i class="fas fa-tachometer-alt"></i><span class="ms-1 d-none d-sm-inline">Panel</span>
				</a>
			</li>
			<li>
				<a class="nav-link px-0 align-middle link-light" href="{{ route('admin.albums.index') }}">
					<i class="fas fa-images"></i><span class="ms-1 d-none d-sm-inline">Albums</span>					
				</a>
			</li>
			<li>
				<a class="nav-link px-0 align-middle link-light" href="{{ route('admin.photos.index') }}">
					<i class="fas fa-camera"></i><span class="ms-1 d-none d-sm-inline">Fotos</span>
				</a>
			</li>
			
			<li>
				<a class="nav-link px-0 align-middle link-light" href="#">
					<i class="fas fa-home"></i><span class="ms-1 d-none d-sm-inline">Inicio</span>
					
				</a>
			</li>
			<li>
				<a class="nav-link px-0 align-middle link-light" href="#">
					<i class="fas fa-address-card"></i><span class="ms-1 d-none d-sm-inline">Sobre mí</span>
				</a>
			</li>
			<li>
				<a class="nav-link px-0 align-middle link-light" href="#">
					<i class="fas fa-users"></i><span class="ms-1 d-none d-sm-inline">Usuarios</span>
				</a>
			</li>
		</ul>
	</div>
</nav>

