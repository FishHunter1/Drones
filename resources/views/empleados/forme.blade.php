@extends('layouts.dashboard')

@section('title', 'formulario-empleados')

@section('content')

<body data-spy="scroll" data-target="#ftco-navbar" data-offset="200">
    <div id="app">
        <div class="main-wrapper main-wrapper-1" style="position: relative; min-height: 100vh;">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{asset('images/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block"> {{ $authUser ? $authUser->nombre : 'Invitado' }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{route('logout')}}" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                  <div class="sidebar-brand">
                    <a href="{{route('home')}}">TrailBrazer</a>
                  </div>
                  <div class="sidebar-brand sidebar-brand-sm">
                    <a href="">St</a>
                  </div>
                  <ul class="sidebar-menu">
                    <li class="menu-header">Dashboard</li>
                    <li class="dropdown">
                      <a href="{{route('dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                    </li>
                    <li class="menu-header">TrailBrazer</li>
                    <li class="dropdown active">
                      <a href="{{route('liste')}}" class="nav-link"><i class="fa fa-user"></i> <span>Empleados</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="{{route('listc')}}" class="nav-link" data-tooggle="dropdown"><i class="fa fa-truck"></i> <span>Camiones</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link" data-tooggle="dropdown"><i class="fas fa-route"></i> <span>Rutas</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="{{route('listr')}}" class="nav-link" data-tooggle="dropdown"><i class="far fa-file-alt"></i> <span>Reportes</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="{{route('drones')}}" class="nav-link"><i class="fas fa-plane"></i> <span>Drones</span></a>
                    </li>
                    <li class="dropdown">
                      <a href="{{route('mapa')}}" class="nav-link"><i class="fas fa-map-marker-alt"></i> <span>Google Maps</span></a>
                    </li>
                  <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                    <a href="https://www.youtube.com/watch?v=7q7wAABkdaQ" class="btn btn-primary btn-lg btn-block btn-icon-split">
                      <i class="fas fa-rocket"></i> No Tocar
                    </a>
                  </div>
                </aside>
              </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="section-body d-flex justify-content-start" style="min-height: 80vh;">
                        <!-- Formulario de registro a la izquierda -->
                        <div class="col-lg-6 col-md-8 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Formulario para Registro de Empleados</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('RegistroE.create') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" name="nombre" class="form-control" placeholder="Ingresa tu nombre" required autocomplete="new-name">
                                        </div>
                                        <div class="form-group">
                                            <label for="apeliido">Apellido</label>
                                            <input type="text" name="apellido" class="form-control" placeholder="Ingresa tu apellido" required autocomplete="new-apellido">
                                        </div>
                                        <div class="form-group">
                                            <label for="cedula">Cedula</label>
                                            <input type="ced" name="cedula" class="form-control" placeholder="Ingresa tu cedula" required autocomplete="new-cedula">
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono">Telefono</label>
                                            <input type="tel" name="telefono" class="form-control" placeholder="Ingresa tu telefono" required autocomplete="new-telefono">
                                        </div>
                                        <div class="form-group">
                                            <label for="direccion">Direccion</label>
                                            <input type="direccion" name="direccion" class="form-control" placeholder="Ingresa tu direccion" required autocomplete="new-direccion">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Correo Electrónico</label>
                                            <input type="email" name="email" class="form-control" placeholder="Ingresa tu correo" required autocomplete="new-email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Contraseña</label>
                                            <input type="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required autocomplete="new-password">
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirmar Contraseña</label>
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirma la contraseña" required autocomplete="new-password">
                                        </div>
                                        <div class="form-group">
                                            <label for="role">Rol</label>
                                            <select id="role" name="role" class="form-control">
                                                <option value="conductor">Conductor</option>
                                            </select>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                Registrar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Fin del formulario -->
                    </div>
                </section>
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2024 <div class="bullet"></div> TrailBrazer
                </div>
            </footer>
        </div>
    </div>
@endsection
