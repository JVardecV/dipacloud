@if(Auth()->user()->hasRole('Admin'))
<li class="active">
    <a href="{{ route('dashboard') }}"><i class="fas fa-chart-line"></i> Panel</a>
</li>
@endif
@if(Auth()->user()->hasRole('Admin|Suscriptor'))
<li>
    <a href="#" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" data-target="#profileSubmenu"><i class="fas fa-user-circle"></i> Mi perfil</a>
    <ul class="collapse list-unstyled" id="profileSubmenu">
        <li>
            <a href="#">Ver mi perfil</a>
        </li>
        <li>
            <a href="#">Actualizar perfil</a>
        </li>
    </ul>
</li>
<li>
    <a href="#filesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-file-upload"></i> Mis archivos</a>
    <ul class="collapse list-unstyled" id="filesSubmenu">
        <li>
            <a href="{{ route('file.create') }}">Agregar archivo</a>
        </li>
        <li>
            <a href="{{ route('file.images') }}">Imágenes</a>
        </li>
        <li>
            <a href="{{ route('file.videos') }}">Videos</a>
        </li>
        <li>
            <a href="{{ route('file.audios') }}">Audios</a>
        </li>
        <li>
            <a href="{{ route('file.documents') }}">Documentos</a>
        </li>
    </ul>
</li>

<li>
    <a href="{{ route('subscriptions.index') }}"><i class="fas fa-chart-line"></i> Suscripciones</a>
</li>


@endif
@if(Auth()->user()->hasRole('Admin'))
<li>
    <a href="#rolesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-unlock-alt"></i> Roles</a>
    <ul class="collapse list-unstyled" id="rolesSubmenu">
        <li>
            <a href="{{ route('role.index') }}">Ver todos</a>
        </li>
        <li>
            <a href="{{ route('role.create') }}">Agregar rol</a>
        </li>
    </ul>
</li>
<li>
    <a href="#permissionSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-fingerprint"></i> Permisos</a>
    <ul class="collapse list-unstyled" id="permissionSubmenu">
        <li>
            <a href="{{ route('permission.index') }}">Ver todos</a>
        </li>
        <li>
            <a href="{{ route('permission.create') }}">Agregar permiso</a>
        </li>
    </ul>
</li>

<li>
    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users"></i> Usuarios</a>
    <ul class="collapse list-unstyled" id="pageSubmenu">
        <li>
            <a href="{{ route('user.index') }}">Ver todos</a>
        </li>
        <li>
            <a href="{{ route('user.create') }}">Agregar usuario</a>
        </li>
    </ul>
</li>
<li>
    <a href="#"><i class="far fa-question-circle"></i> Soporte</a>
</li>

<li>
    <a href="#PlansSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users"></i> Planes</a>
    <ul class="collapse list-unstyled" id="PlansSubmenu">
        <li>
            <a href="{{ route('plan.index') }}">Ver todos</a>
        </li>
        <li>
            <a href="{{ route('plan.create') }}">Agregar plan</a>
        </li>
    </ul>
</li>
@endif
<li>
    <a href="mailto:soporte@dipacloud.cl"><i class="far fa-question-circle"></i> Soporte</a>
</li>
</ul>

<ul class="list-unstyled CTAs">
<li>
    <a href="{{ route('logout') }}" class="logout" onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
             <i class="fas fa-power-off"></i> Cerrar sesión</a>
</li>