@extends('admin.layouts.app')

@section('page','Crear un nuevo permiso')

@section('content')

<form class="was-validated" action="{{ route('permission.store') }}" method="POST">
	@csrf
	<input type="hidden" name="_method" value="PATCH">

	<div class="form-row">
		<div class="col-sm-6 mb-3">
			<label for="RoleName">Nombre del permiso (Ej: role.create)</label>
			<input type="text" name="name" class="form-control is-valid" id="RoleName" placeholder="role.create" required>
			<div class="invalid-feedback">¡Debes agregar un nombre de permiso!</div>
		</div>
		<div class="col-sm-6 mb-3">
			<label for="RoleName">Descripción del permiso</label>
			<input type="text" name="description" class="form-control is-valid" id="RoleName" placeholder="Detalles del permiso" required>
			<div class="invalid-feedback">¡Debes agregar una descripción!</div>
		</div>
		
	</div>
	<button class="btn btn-outline-success" type="submit"><i class="fas fa-plus-circle"></i> Agregar</button>
	 
</form>

@endsection

