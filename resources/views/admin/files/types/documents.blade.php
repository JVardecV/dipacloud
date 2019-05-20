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
			 			<th scope="col">Nombre</th>
			 			<th scope="col">Subido</th>
			 			<th scope="col">Ver</th>
			 			<th scope="col">Eliminar</th>
			 		</tr>
			 	</thead>
			 	<tbody>
			 		@foreach($documents as $document)
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
			 			</th>
			 			<th scope="row">{{ $document->name }}</th>
			 			<th scope="row">{{ $document->created_at->DiffForHumans() }}</th>
			 			<th scope="row">
			 				@if($document->extension == 'pdf' || $document->extension == 'PDF')
								<a class="btn btn-primary" style="width:50%;" target="_blank" href="{{ asset('storage') }}/{{ $folder }}/document/{{ $document->name }}.{{ $document->extension }}"><i class="fas fa-eye"></i> Ver</a></th>
			 				@else
			 					<a class="btn btn-success" style="width:50%;" target="_blank" href="{{ asset('storage') }}/{{ $folder }}/document/{{ $document->name }}.{{ $document->extension }}"><i class="fas fa-download"></i> Descargar</a></th>
			 				@endif
			 				
			 			<th scope="row">
							<form action="{{ route('file.destroy',$document->id) }}" method="POST">
								@csrf
								<input type="hidden" name="_method" value="PATCH">
								<button class="btn btn-danger float-right" type="submit"><i class="fas fa-trash"></i> Eliminar</button>
							</form>


							{{-- <a class="btn btn-danger float-right" href="#"><i class="fas fa-trash"></i> Eliminar</a> --}}
			 			</th>
			 		</tr>
			 	</tbody>
			 	@endforeach
			 </table>
		</div>
		
	</div>
</div>



@endsection
