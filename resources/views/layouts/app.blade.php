<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'bytemo') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles  tadatable -->
    <!--<link rhref="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" el="stylesheet" >-->
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/fontello.css') }}">

    <!-- Iconos para tempusdominus -->
    <!-- Tempusdominus DateTime Picker-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />

    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'bytemo') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTienda" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-tags"></i>Tienda
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownTienda">
                                    <a class="dropdown-item" href="{{ route('shop') }}">Registrar venta</a>
                                    <!--<a class="dropdown-item" href="#">Registrar cotización</a>-->
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAdmVentas" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-list-alt"></i>Administrar ventas
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownAdmVentas">
                                    <a class="dropdown-item" href="{{ route('client') }}">Clientes</a>
                                    <a class="dropdown-item" href="#">Cotizaciones </a>
                                    <a class="dropdown-item" href="#">Ventas</a>
                                    <!--<a class="dropdown-item" href="#">Devoluciones</a>-->
                                    <a class="dropdown-item" href="{{ route('seller') }}">Vendedores</a>
                                    <a class="dropdown-item" href="#">Facturas</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Cuentas por Cobrar</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAdmInventario" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-box"></i>Administrar inventario
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownAdmInventario">
                                    <a class="dropdown-item" href="{{ route('product') }}">Productos</a>
                                    <a class="dropdown-item" href="{{ route('batch') }}">Lotes (Compras)</a>
                                    <a class="dropdown-item" href="{{ route('provider') }}">Proveedores</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Cuentas por Pagar</a>         
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownReportes" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-chart-bar"></i>Reportes
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownReportes">
                                    <a class="dropdown-item" href="#">Reporte</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAdministracion" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-sliders"></i>Configuración
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownAdministracion">
                                    <a class="dropdown-item" href="#">Empresa</a>
                                    <a class="dropdown-item" href="#">Usuarios</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('industry') }}">Industrias</a>
                                    <a class="dropdown-item" href="{{ route('deposit') }}">Almacenes</a>
                                    <a class="dropdown-item" href="{{ route('zone') }}">Zonas</a>            
                                    <a class="dropdown-item" href="{{ route('line') }}">Lineas</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="!#">Cambiar contraseña</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="p-2">
            @yield('content')
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <!--Alert-->
    <script src="{{ asset('js/assets/toastr.js') }}"></script>
    <!--Date Tables-->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <!--Export Print DateTables-->
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>

    <!--Tempusdominus DateTime Picker-->
    <script src="{{ asset('js/assets/moment.js') }}"></script>
    <script src="{{ asset('js/assets/es.js') }}"></script>
    <script src="{{ asset('js/assets/tempusdominus-bootstrap-4.js') }}"></script>

    @yield('scripts')
</body>
</html>
