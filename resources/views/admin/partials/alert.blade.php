@if(session('info'))
        <div class="alert alert-{{ session('info')[0] }}" role="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">x
            </span>
            <strong>¡Éxito!</strong> {{ session('info')[1] }}
        </div>
@endif