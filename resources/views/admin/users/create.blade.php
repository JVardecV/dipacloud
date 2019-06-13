@extends('admin.layouts.app')

@section('page','Crear un nuevo usuario')

@section('content')

<form class="was-validated" action="{{ route('user.store') }}" method="POST">
	@csrf
	<input type="hidden" name="_method" value="PATCH">
	<div class="form-row">
		<div class="col-sm-6 mb-3">
			<label for="Name">Nombre del usuario</label>
			<input type="text" name="name" class="form-control is-valid" id="Name" placeholder="Nombres Apellidos" required>
			<div class="invalid-feedback">¡Debes agregar un nombre completo!</div>
		</div>
		<div class="col-sm-6 mb-3">
			<label for="userName">Username</label>
			<input type="text" name="username" class="form-control is-valid" id="userName" placeholder="Nombres Apellidos" required>
			<div class="invalid-feedback">¡Debes agregar un username!</div>
		</div>
		<div class="col-sm-6 mb-3">
			<label for="Email">Email del usuario</label>
			<input type="email" name="email" class="form-control is-valid" id="UserEmail" placeholder="ejemplo@gmail.com" required>
			<div class="invalid-feedback">¡Debes agregar un email!</div>
		</div>
		<div class="col-sm-6 mb-3">
			<label for="Password">Password del usuario</label>
			<input type="password" name="password" class="form-control is-valid" id="UserPassword" required>
			<div class="invalid-feedback">¡Debes agregar una contraseña!</div>
		</div>
		<div class="col-sm-6 mb-3">
			<label for="UserImage">Imagen del usuario (por defecto)</label>
			<input type="image" name="image" class="form-control is-valid" id="UserImage" value="user.svg" disabled>
			<div class="invalid-feedback">¡Debes agregar una iamgen de usuario!</div>
		</div>



		<div class="col-sm-6 mb-3">
			<label for="RoleName">¡Ten cuidado con los permisos que otorgas!</label>
			<div class="form-group">
				<ul class="list-group list-group-flush">
					<div class="col-auto my-1">
						<div class="custom-control custom-checkbox mr-sm-2">
							@foreach($roles as $role)
								<li class="list-group">
									<input type="checkbox" name="roles[]" class="custom-control-input" id="{{ $role->id }}" value="{{ $role->id }}">
									<label class="custom-control-label" for="{{ $role->id }}">{{ $role->name }}</label>
								</li>
							@endforeach
						</div>
					</div>
				</ul>
			</div>
		</div>
	</div>
	<button class="btn btn-primary" type="submit"><i class="fas fa-plus-circle"></i> Agregar</button>
	 
</form>

@endsection

