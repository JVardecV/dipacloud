@extends('admin.layouts.app')

@section('page','Documentos')

@section('content')
	
<div class="container">
	<div class="row">
		<div class="col-sm-12 table-responsive">
			 <table class="table table-hover">
			 	<thead>
			 		<tr>
			 			<th scope="col"></th>
			 			<th scope="col">Usuario</th>
			 			<th scope="col">Subido</th>
			 			@if(Auth::user()->hasRole("Admin"))
			 			<th scope="col">Nombre</th>
			 			@endif
			 			<th scope="col" width="27%">Ver</th>
			 			<th scope="col">Eliminar</th>
			 		</tr>
			 	</thead>
			 	<tbody>
			 		@forelse($documents as $document)
			 		<tr>
			 			<th scope="row">
			 				@if($document->extension == 'pdf' || $document->extension == 'PDF')
								<img class="img-responsive" src="{{ asset('img/files/pdf.svg') }}" width="35px">
			 				@endif
			 				@if($document->extension == 'xlsx' || $document->extension == 'XLSX')
								<img class="img-responsive" src="{{ asset('img/files/excel.svg') }}" width="35px">
			 				@endif
			 				@if($document->extension == 'docx' || $document->extension == 'DOCX')
								<img class="img-responsive" src="{{ asset('img/files/word.svg') }}" width="35px">
			 				@endif
			 				@if($document->extension == 'dxf' || $document->extension == 'DXF')
								<img class="img-responsive" src="{{ asset('img/files/dxf.svg') }}" width="35px">
			 				@endif
			 				@if($document->extension == 'dwg' || $document->extension == 'DWG')
								<img class="img-responsive" src="{{ asset('img/files/dwg.svg') }}" width="35px">
			 				@endif
			 				@if($document->extension == 'kml' || $document->extension == 'KML')
								<img class="img-responsive" src="{{ asset('img/files/kml.svg') }}" width="35px">
			 				@endif
			 				@if($document->extension == '3dm' || $document->extension == '3DM')
								<img class="img-responsive" src="{{ asset('img/files/3dm.svg') }}" width="35px">
			 				@endif
			 				@if($document->extension == 'pptx' || $document->extension == 'PPTX')
								<img class="img-responsive" src="{{ asset('img/files/powerpoint.svg') }}" width="35px">
			 				@endif
			 			</th>
			 			<th scope="row">{{ $document->user->name }}</th>
			 			<th scope="row">{{ $document->created_at->DiffForHumans() }}</th>
			 			@if(Auth::user()->hasRole("Admin"))
			 			<th scope="col">{{ $document->name }}</th>
			 			@endif
			 			<th scope="row">
			 				@if($document->extension == 'pdf' || $document->extension == 'PDF')
								<a class="btn btn-primary" style="width:50%;" target="_blank" href="{{ asset('storage') }}/{{ $document->folder }}/document/{{ $document->name }}.{{ $document->extension }}"><i class="fas fa-eye"></i> Ver</a></th>
			 				@else
			 					<a class="btn btn-success" style="width:50%;" target="_blank" href="{{ asset('storage') }}/{{ $document->folder }}/document/{{ $document->name }}.{{ $document->extension }}"><i class="fas fa-download"></i> Descargar</a></th>
			 				@endif
			 				
			 			<th scope="row">
							<a class="btn btn-danger text-white" data-toggle="modal" data-target="#deleteModal" data-file-id={{ $document->id }}><i class="fas fa-trash"></i> Eliminar</a>
			 			</th>
			 		</tr>
			 	</tbody>
			 	@empty
			 	<div class="container mb-3">
					<div class="alert alert-warning" role="alert">
			        	<span class="closebtn" onclick="this.parentElement.style.display='none';">x</span>
			        	<strong>¡Atención!</strong> ¡No tienes ningún documento!
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