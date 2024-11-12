@extends('layouts.dashboard')

@section('title', 'formulario-camiones')

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
                    <li class="dropdown">
                      <a href="{{route('liste')}}" class="nav-link"><i class="fa fa-user"></i> <span>Empleados</span></a>
                    </li>
                    <li class="dropdown active">
                        <a href="{{route('listc')}}" class="nav-link" data-tooggle="dropdown"><i class="fa fa-truck"></i> <span>Camiones</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="{{route('reportesm')}}" class="nav-link" data-tooggle="dropdown"><i class="far fa-file-alt"></i> <span>Reportes</span></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="nav-link"><i class="fas fa-map-marker-alt"></i> <span>Google Maps</span></a>
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
                                    <form action="{{ route('RegistroC.createc') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="placa">Placa</label>
                                            <input type="text" name="placa" id="placa" class="form-control" placeholder="Ingresa la placa" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="marca">Marca</label>
                                            <input type="text" name="marca" id="marca" class="form-control" placeholder="Ingresa la marca" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="modelo">Modelo</label>
                                            <input type="text" name="modelo" id="modelo" class="form-control" placeholder="Ingresa el modelo" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="año">Año</label>
                                            <input type="number" name="año" id="año" class="form-control" placeholder="Ingresa el año" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="estatus">Estatus</label>
                                            <select name="estatus" id="estatus" class="form-control" required>
                                                <option value="activo">Activo</option>
                                                <option value="inactivo">Inactivo</option>
                                                <option value="mantenimiento">Mantenimiento</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tipo_combustible">Combustible</label>
                                            <select name="tipo_combustible" id="combustible" class="form-control" required>
                                                <option value="Diesel">Diesel</option>
                                                <option value="Gasolina">Gasolina</option> <!-- Agregué otro valor como ejemplo -->
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="kilometraje">Kilometraje</label>
                                            <input type="number" name="kilometraje" id="kilometraje" class="form-control" placeholder="Ingresa el kilometraje" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="fecha_integracion">Fecha de Integración</label>
                                            <input type="date" name="fecha_integracion" id="fecha_integracion" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="conductor_id">Conductor</label>
                                            <select name="conductor_id" id="conductor_id" class="form-control" required>
                                                <option value="">Seleccionar conductor</option>
                                                @foreach ($conductores as $conductor)
                                                    <option value="{{ $conductor->id }}">{{ $conductor->usuario->nombre }} {{ $conductor->usuario->apellido }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Registrar vehículo</button>
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
