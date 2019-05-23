@extends('admin.layouts.app')

@section('page','Editar un permiso')

@section('content')

<form class="was-validated" action="{{ route('permission.update',$permission->id) }}" method="POST">
	@csrf
	@method('PATCH')
	<div class="form-row">
		<div class="col-sm-6 mb-3">
			<label for="permissionName">Nombre del permiso</label>
			<input type="text" name="name" class="form-control is-valid" id="permissionName" value="{{ $permission->name }}" required>
			<div class="invalid-feedback">¡el nombre no puede estar en blanco!</div>
		</div>

		<div class="col-sm-6 mb-3">
			<label for="permissionName">Descripcion del permiso</label>
			<input type="text" name="description" class="form-control is-valid" id="permissionName" value="{{ $permission->description }}" required>
			<div class="invalid-feedback">¡Debes agregar una descripción!</div>
		</div>
		

	</div>
	<button class="btn btn-outline-success" type="submit"><i class="fas fa-plus-circle"></i> Actualizar</button>
	 
</form>

@endsection

