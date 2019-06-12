<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DipaSecure') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header> 
      <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top alert-home">
            <a class="navbar-brand" href="{{ route('home') }}">
               <img src="{{asset('img/owl.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
            DipaSecure
            </a>

         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDS" aria-controls="navbarsDS" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarsDS">
           <ul class="navbar-nav ml-auto">
             <li class="nav-item active">
               <a class="nav-link" href="{{ route('home') }}">Inicio <span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="#">Características</a>
             </li>
             <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown06" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Más información</a>
               <div class="dropdown-menu" aria-labelledby="dropdown06">
                 <a class="dropdown-item" href="{{ route('secure') }}">Seguridad</a>
                 <a class="dropdown-item" href="#">Clientes</a>
                 <a class="dropdown-item" href="#">Preguntas frecuentes</a>
               </div>
             </li>
             @guest
               <li class="nav-item">
                  <a href="{{ route('login') }}" class="btn btn-outline-primary">Ingresar</a>
               </li>
             @else
                @if(Auth::user()->hasRole('Suscriptor'))
                  <li class="nav-item">
                    <a href="{{ route('file.create') }}" class="nav-link" style="color: black;">Sube tus archivos</a>
                  </li>
                @endif
                @if(Auth::user()->hasRole('Admin'))
                  <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link" style="color: black;">Panel administrativo</a>
                  </li>
                @endif
                <li>
                    <a href="{{ route('logout') }}" class="btn btn-outline-danger" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <i class="fas fa-power-off"></i> Cerrar sesión</a>
                </li>
             @endguest
           </ul>
         </div>
      </nav>
    </header>
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
                                <a>Panel administrativo</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

    @yield('content')
      
      <div class="alert-home"></div>

         <footer class="container py-5">
            <div class="row">
               <div class="col-12 col-md">
                  <img src="img/owl.png" width="100">
                  <small class="d-block mb-3 text-muted text-left">® DipaSecure</small>
               </div>

               <div class="col-sm-6 col-md-3">
                  <h5>DipaSecure</h5>
                  <p class="text-small text-muted">
                     Los pagos y el almacenamiento dentro de nuestra plataforma son totalmente seguros. Los archivos estarán disponibles instantáneamente. Contamos con un servicio de almacenamiento 24/7
                  </p>
               </div>

               <div class="col-sm-6 col-md-3 text-center">
                  <h5>Más información</h5>
                  <ul class="list-unstyled text-small">
                     <li><a class="text-muted" href="#">Youtube</a></li>
                     <li><a class="text-muted" href="#">Twitter</a></li>
                  </ul>
               </div>
               <div class="col-sm-6 col-md-3 text-right">
                  <h5>Medios de pago</h5>
                  <img class="img-fluid" src="img/payment_cards.jpg" width="220">
               </div>
         </footer>
    
  </body>
</html>
