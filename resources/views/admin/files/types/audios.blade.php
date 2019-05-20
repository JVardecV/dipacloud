@extends('admin.layouts.app')

@section('page','Audios')

@section('content')
	
<div class="container">
	<div class="row">
	@forelse($audios as $audio)
		<div class="col-sm-12 cold-md-4 pb-4">
			 <audio src="{{ asset('storage') }}/{{ $folder }}/audio/{{ $audio->name }}.{{ $audio->extension }}" controls>
			 </audio>
			 <form action="{{ route('file.destroy',$audio->id) }}" method="POST">
				@csrf
				<input type="hidden" name="_method" value="PATCH">
				<button class="btn btn-danger float-right" type="submit"><i class="fas fa-trash"></i> Eliminar</button>
			</form>
		</div>
	@empty
	<div class="container mb-3">
		<div class="alert alert-warning" role="alert">
        	<span class="closebtn" onclick="this.parentElement.style.display='none';">x</span>
        	<strong>¡Atención!</strong> ¡No tienes ningún archivo de audio!
    	</div>
	</div>
	@endforelse	
	</div>
</div>



@endsection