@extends('admin.layouts.app')

@section('page','Imágenes')

@section('content')
	
<div class="container">
	<div class="row">
	@foreach($images as $image)
		<div class="col-sm-6 cold-md-4">
			 <div class="card" style="width: 18rem;">
			 	<img class="card-img-top" src="{{ asset('storage') }}/{{ $folder }}/image/{{ $image->name }}.{{ $image->extension }}" alt="{{ $image->name }}">
			 
				 <div class="card-body">
				 	<a href="{{ asset('storage') }}/{{ $folder }}/image/{{ $image->name }}.{{ $image->extension }}" target="_blank" class="btn btn-primary"><i class="fas fa-eye"></i> Ver</a>
				 	{{-- <a href="" class="btn btn-danger float-right"><i class="fas fa-trash"></i> Eliminar</a> --}}
				 	<th scope="row">
						<form action="{{ route('file.destroy',$image->id) }}" method="POST">
							@csrf
							<input type="hidden" name="_method" value="PATCH">
							<button class="btn btn-danger float-right" type="submit"><i class="fas fa-trash"></i> Eliminar</button>
						</form>
		 			</th>
				 </div>
			</div>
		</div>
	@endforeach	
	</div>
</div>






	
@endsection