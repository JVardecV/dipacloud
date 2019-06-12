@extends('admin.layouts.app')

@section('page','Mis facturas')

@section('content')
	
<div class="container">
	<div class="row">
		<div class="col-sm-12 table-responsive">
			 <table class="table table-hover">
			 	<thead>
			 		<tr>
			 			<th scope="col">ID</th>
			 			<th scope="col">Monto</th>
			 			<th scope="col">Facturación</th>
			 			<th scope="col">Moneda</th>
			 			<th scope="col">Soporte</th>
			 		</tr>
			 	</thead>
			 	<tbody>
			 		@forelse($facturas as $pago)
					<tr>
			 			<th scope="row">{{ $pago->id }}</th>
			 			<th scope="row">${{ $pago->total }}</th>
			 			<th scope="row">Autómatica</th>
			 			<th scope="row" class="text-uppercase">{{ $pago->currency }}</th>
			 			<th scope="row">
			 				<a href="{{ $pago->hosted_invoice_url }}" target="_blank" class="btn btn-success">Ver</a>
			 			</th>
			 		</tr>
			 	</tbody>
			 	@empty
			 	<div class="container mb-3">
					<div class="alert alert-warning" role="alert">
			        	<span class="closebtn" onclick="this.parentElement.style.display='none';">x</span>
			        	<strong>¡Atención!</strong> ¡No se encontraron suscripciones!
			    	</div>
				</div>
			 	@endforelse
			 </table>
		</div>
		
	</div>
</div>

	<!-- Modal -->
	@include('admin.partials.modals.files')

@endsection

@section('scripts')
	@include('admin.partials.js.deleteModal')
@endsection