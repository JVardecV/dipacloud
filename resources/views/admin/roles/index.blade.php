@extends('admin.layouts.app')

@section('page','Todos los roles')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-sm-12 table-responsive">
			 <table class="table table-hover">
			 	<thead>
			 		<tr>
			 			<th scope="col">#</th>
			 			<th scope="col">Nombre</th>
			 			<th scope="col">Ver</th>
			 			<th scope="col">Editar</th>
			 			<th scope="col">Eliminar</th>
			 		</tr>
			 	</thead>
			 	<tbody>
			 	@forelse($roles as $role)
			 		<tr>
			 			<th scope="row">{{ $role->id }}</th>
			 			<th scope="row">{{ $role->name }}</th>
			 			<th scope="row">Ver</th>
			 			<th scope="row">
			 				<a class="btn btn-primary" href="{{ route('role.edit', $role->id) }}"><i class="fas fa-pencil"></i>Editar</a></th>
						{{-- <th scope="row">
						<button class="btn btn-danger pull-right" type="submit" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i> Eliminar</button> --}}
						{{--<!-- Modal -->
								<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Confirmar eliminación</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        ¿Desea eliminar este archivo?
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
								        <form action="{{ route('file.destroy',$video->id) }}" method="POST">
											@csrf
											<input type="hidden" name="_method" value="PATCH">
											<button class="btn btn-danger float-right" type="submit"><i class="fas fa-trash"></i> Eliminar</button>
										</form>
								      </div>
								    </div>
								  </div>--}}
							</div>
			 			</th>
			 		</tr>
			 	</tbody>
				@empty
				<div class="alert alert-warning mb-5" role="alert">
		            <span class="closebtn" onclick="this.parentElement.style.display='none';">x
		            </span>
		            <strong>¡Atención!</strong> ¡No tienes ningún rol!
		        </div>
			 	@endforelse
			 </table>
		</div>
		
	</div>
</div>

@endsection

