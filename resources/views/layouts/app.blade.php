<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!-- Custom fonts for this template-->
    <link href="{{ asset('css/template/all.min.css') }}" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/template/sb-admin-2.min.css') }}" rel="stylesheet">


    <!-- Datatables-->
    <link href="{{ asset('css/datatables/datatables.min.css') }}" rel="stylesheet">

    @yield('styles')
    <!-- Sweetalert2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body id="page-top">
    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div> --}}

    @auth
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <li class="{{ Route::is('roles.*')   ? 'nav-item active' : 'nav-item' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRoles"
                    aria-expanded="true" aria-controls="collapseRoles">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Roles</span>
                </a>
                <div id="collapseRoles" class="{{ Route::is('roles.*')   ? 'collapse show' : 'collapse' }}  " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="{{ Route::is('roles.index')   ? 'collapse-item active' : 'collapse-item' }}" href="{{ route('roles.index') }}">Listar</a>
                        <a class="{{ Route::is('roles.create')   ? 'collapse-item active' : 'collapse-item' }}" href="{{ route('roles.create') }}">Crear</a>
                    </div>
                </div>
            </li>

            <li class="{{ Route::is('users.*')   ? 'nav-item active' : 'nav-item' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                    aria-expanded="true" aria-controls="collapseUsers">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Usuarios</span>
                </a>
                <div id="collapseUsers" class="{{ Route::is('users.*')   ? 'collapse show' : 'collapse' }}  " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="{{ Route::is('users.index')   ? 'collapse-item active' : 'collapse-item' }}" href="{{ route('users.index') }}">Listar</a>
                        <a class="{{ Route::is('users.create')   ? 'collapse-item active' : 'collapse-item' }}" href="{{ route('users.create') }}">Crear</a>
                    </div>
                </div>
            </li>


            <li class="{{ Route::is('categories.*')   ? 'nav-item active' : 'nav-item' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories"
                    aria-expanded="true" aria-controls="collapseCategories">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Categorias</span>
                </a>
                <div id="collapseCategories" class="{{ Route::is('categories.*')   ? 'collapse show' : 'collapse' }}  " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="{{ Route::is('categories.index')   ? 'collapse-item active' : 'collapse-item' }}" href="{{ route('categories.index') }}">Listar</a>
                        <a class="{{ Route::is('categories.create')   ? 'collapse-item active' : 'collapse-item' }}" href="{{ route('categories.create') }}">Crear</a>
                    </div>
                </div>
            </li>


            <li class="{{ Route::is('shoppings.*')   ? 'nav-item active' : 'nav-item' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseshoppings"
                    aria-expanded="true" aria-controls="collapseshoppings">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Compras</span>
                </a>
                <div id="collapseshoppings" class="{{ Route::is('shoppings.*')   ? 'collapse show' : 'collapse' }}  " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="{{ Route::is('shoppings.index')   ? 'collapse-item active' : 'collapse-item' }}" href="{{ route('shoppings.index') }}">Listar</a>
                        <a class="{{ Route::is('shoppings.create')   ? 'collapse-item active' : 'collapse-item' }}" href="{{ route('shoppings.create') }}">Crear</a>
                    </div>
                </div>
            </li>


            <li class="{{ Route::is('products.*')   ? 'nav-item active' : 'nav-item' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
                    aria-expanded="true" aria-controls="collapseProducts">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Productos</span>
                </a>
                <div id="collapseProducts" class="{{ Route::is('products.*')   ? 'collapse show' : 'collapse' }}  " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="{{ Route::is('products.index')   ? 'collapse-item active' : 'collapse-item' }}" href="{{ route('products.index') }}">Listar</a>
                        <a class="{{ Route::is('products.create')   ? 'collapse-item active' : 'collapse-item' }}" href="{{ route('products.create') }}">Crear</a>
                    </div>
                </div>
            </li>



            <!-- Nav Item - Orders Collapse Menu -->
            <li class="{{ Route::is('orders.*')   ? 'nav-item active' : 'nav-item' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders"
                    aria-expanded="true" aria-controls="collapseOrders">
                    <i class="fas fa-fw fa-cart-plus"></i>
                    <span>Ordenes</span>
                </a>
                <div id="collapseOrders" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="{{ Route::is('orders.index')   ? 'collapse-item active' : 'collapse-item' }}" href="{{ route('orders.index') }}">Listar</a>
                        <a class="{{ Route::is('orders.create')   ? 'collapse-item active' : 'collapse-item' }}" href="{{ route('orders.create') }}">Crear</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - reports Collapse Menu -->
            <li class="{{ Route::is('reports.*')   ? 'nav-item active' : 'nav-item' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsereport_per_month"
                    aria-expanded="true" aria-controls="collapsereport_per_month">
                    <i class="fas fa-chart-bar"></i>
                    <span>Reportes</span>
                </a>
                <div id="collapsereport_per_month" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="{{ Route::is('reports.selling_per_month_view')   ? 'collapse-item active' : 'collapse-item' }}" href="{{ route('reports.selling_per_month_view') }}">Ventas por mes</a>
                        <a class="{{ Route::is('reports.most_sell_view')   ? 'collapse-item active' : 'collapse-item' }}" href="{{ route('reports.most_sell_view') }}">Más vendiddos</a>
                        {{--  <a class="{{ Route::is('reports.create')   ? 'collapse-item active' : 'collapse-item' }}" href="{{ route('reports.create') }}">Crear</a>  --}}
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }} - {{ Auth::user()->roles[0]->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('users.update',[Auth::user()->id]) }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="{{ route('companies.create') }}">
                                    <i class="fas fa-building fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Informacion de la empresa
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    {{--  <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>  --}}
                    @yield('content')


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Listo para irse?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>

                    <a class="btn btn-primary" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Cerrar sesión') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>


                </div>
            </div>
        </div>
    </div>
    @endauth

    @guest
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Iniciar Sesión') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Nombre se usuario') }}</label>

                                {{--  <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>  --}}
                                <div class="col-md-6">
                                    {{--  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>  --}}
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Recuerdame') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Iniciar Sesión') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        {{--  <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>  --}}
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endguest





    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/template/jquery.min.js') }}"></script>
    <script src="{{ asset('js/template/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('js/template/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/template/sb-admin-2.min.js') }}"></script>


    <!-- Validate -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>


    @yield('scripts')
    <!-- Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

</body>

</html>
