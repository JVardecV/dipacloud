<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DipaSecure - Dashboard') }}</title>

    <!-- Scripts -->
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

</head>
<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <a class="navbar-brand ml-4 pt-4" href="#">
               <img src="{{ asset('img/owl.png') }}" width="70" height="70" class="d-inline-block align-top" alt="">
            DipaSecure
            </a>

          <div class="container mt-4 mb-2">
            <div class="mb-2">
            <img src="{{ asset('img/user_static.png') }}" class="img-responsive" style="border-radius: 50%;" alt="" height="100" width="70">
          </div>
          <div class="profile-usertitle">
            <div class="profile-usertitle-name">Javier Valdés</div>
            <div class="profile-usertitle-status">admin.ti@gmail.com</div>
          </div>
          </div>

            <ul class="list-unstyled components">
              <li class="active">
                    <a href="{{ route('dashboard') }}"><i class="fas fa-chart-line"></i> Panel</a>
                </li>

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
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="{{ route('logout') }}" class="logout" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                             <i class="fas fa-power-off"></i> Cerrar sesión</a>
                </li>
            </ul>
        </nav>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <div id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a>@yield('page')</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        
    

    @include('admin.partials.alert')

    @include('admin.partials.error')

    @yield('content')

    <script src="{{ asset('js/slim.min.js') }}"></script>
      
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>

    @yield('scripts') 

         
  </div>  
  </body>
</html>
