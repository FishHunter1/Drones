@extends('layouts.dashboard')

@section('title', 'Lista-Rutas')

@section('content')
<body data-spy="scroll" data-target="#ftco-navbar" data-offset="200">
    <div id="app" class="main-wrapper main-wrapper-1" style="display: flex; flex-direction: column; min-height: 100vh;">
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
                <li class="dropdown active">
                  <a href="{{route('dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                </li>
                @if(auth()->check() && in_array(auth()->user()->rol->nombre, ['Administrador', 'Conductor']))
                    <li class="menu-header">TrailBrazer</li>
                    @if(auth()->check() && auth()->user()->rol->nombre == 'Administrador')
                        <li class="dropdown">
                        <a href="{{route('liste')}}" class="nav-link"><i class="fa fa-user"></i> <span>Empleados</span></a>
                        </li>
                    @endif
                    <li class="dropdown">
                        <a href="{{route('listc')}}" class="nav-link" data-tooggle="dropdown"><i class="fa fa-truck"></i> <span>Camiones</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="{{route('listaru')}}" class="nav-link" data-tooggle="dropdown"><i class="fas fa-route"></i> <span>Rutas</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="{{route('listr')}}" class="nav-link" data-tooggle="dropdown"><i class="far fa-file-alt"></i> <span>Reportes</span></a>
                    </li>
                    <li class="dropdown">
                    <a href="{{route('mapa')}}" class="nav-link"><i class="fas fa-map-marker-alt"></i> <span>Google Maps</span></a>
                    </li>
                @endif
              <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                <a href="https://www.youtube.com/watch?v=7q7wAABkdaQ" class="btn btn-primary btn-lg btn-block btn-icon-split">
                  <i class="fas fa-rocket"></i> No Tocar
                </a>
              </div>
            </aside>
          </div>

        <div class="main-content" style="flex-grow: 1;">
            <section class="section">
                <div class="section-header">
                    <h1 class="text-primary">Lista de Reportes</h1>
                </div>
                <div class="section-body">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Rutas Asignadas</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered rounded-lg shadow-lg">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th class="p-3 border-b border-gray-300 rounded-tl-lg">Vehículo</th>
                                        <th class="p-3 border-b border-gray-300">Fecha</th>
                                        <th class="p-3 border-b border-gray-300">Tipo</th>
                                        <th class="p-3 border-b border-gray-300">Descripción</th>
                                        <th class="p-3 border-b border-gray-300">Proveedor</th>
                                        <th class="p-3 border-b border-gray-300">Precio</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        @if(auth()->check() && auth()->user()->rol->nombre == 'Administrador')
                            <div class="card-footer text-right">
                                <a href="{{ route('reportesm') }}" class="btn btn-success"><i class="fas fa-plus"></i> Agregar Reporte Mantenimiento</a>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        </div>

        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2024 <div class="bullet"></div> TrailBrazer
            </div>
        </footer>
    </div>
</body>
@endsection
