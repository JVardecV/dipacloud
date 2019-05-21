@extends('admin.layouts.app')

@section('page','Detalles del rol')

@section('content')


	<div class="form-row">
		<div class="col-sm-6 mb-3">
			<label for="RoleName">Nombre del rol</label>
			<input type="text" name="name" class="form-control is-valid" id="RoleName" value="{{ $role->name }}" disabled>
		</div>
		<div class="col-sm-6 mb-3">
			<label for="RoleName">Permisos que tiene el rol</label>
			<div class="form-group">
				<ul class="list-group list-group-flush">
					<div class="col-auto my-1">
						<div class="custom-control custom-checkbox mr-sm-2">
							@forelse($permissions as $permission)
								<li class="list-group">
									<input type="checkbox" name="permissions[]" class="custom-control-input" id="{{ $permission->id }}" value="{{ $permission->id }}" disabled
									@if($role->permissions->contains($permission)) checked
									@endif
									>
									<label class="custom-control-label" for="{{ $permission->id }}">{{ $permission->description }}</label>
								</li>
							@empty
								<li>No cuenta con permisos</li>
							@endforelse
						</div>
					</div>
				</ul>
			</div>
		</div>
	</div>

	<a class="btn btn-outline-success" href="{{ route('role.index') }}"><i class="fas fa-arrow-circle-left"></i> Volver</a>
	

@endsection

