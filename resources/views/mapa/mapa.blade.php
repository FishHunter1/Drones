@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('executeMapScript')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        initMap();
    });
</script>
@endsection

@section('content')
        <div class="main-wrapper main-wrapper-1">
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
                <div class="search-backdrop"></div>
                <div class="search-result">
                  <div class="search-header">
                    Histories
                  </div>
                  <div class="search-item">
                    <a href="#">Como robar un banco</a>
                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                  </div>
                  <div class="search-item">
                    <a href="#">uwucate.com</a>
                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                  </div>
                  <div class="search-item">
                    <a href="{{route('home')}}">TrailBrazer</a>
                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                  </div>
                  <div class="search-header">
                    Result
                  </div>
                  <div class="search-item">
                    <a href="#">
                      <img class="mr-3 rounded" width="30" src="{{asset('images/products/product-3-50.png')}}" alt="product">
                      Alvaro Alexa compralo ya!
                    </a>
                  </div>
                  <div class="search-item">
                    <a href="#">
                      <img class="mr-3 rounded" width="30" src="{{asset('images/products/product-2-50.png')}}" alt="product">
                      Niños haitianos a mitad de precio!
                    </a>
                  </div>
                  <div class="search-item">
                    <a href="#">
                      <img class="mr-3 rounded" width="30" src={{asset('images/products/product-1-50.png')}}" alt="product">
                      Papu Linces
                    </a>
                  </div>
                  <div class="search-header">
                    Projects
                  </div>
                  <div class="search-item">
                    <a href="#">
                      <div class="search-icon bg-danger text-white mr-3">
                        <i class="fas fa-code"></i>
                      </div>
                      TrailBrazer Admin
                    </a>
                  </div>
                  <div class="search-item">
                    <a href="#">
                      <div class="search-icon bg-primary text-white mr-3">
                        <i class="fas fa-laptop"></i>
                      </div>
                      aea
                    </a>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav navbar-right">
              <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                  <div class="dropdown-header">Mensajes
                    <div class="float-right">
                      <a href="#">Marcar como Leido</a>
                    </div>
                  </div>
                  <div class="dropdown-list-content dropdown-list-message">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                      <div class="dropdown-item-avatar">
                        <img alt="image" src="{{asset('images/avatar/avatar-1.png')}}" class="rounded-circle">
                        <div class="is-online"></div>
                      </div>
                      <div class="dropdown-item-desc">
                        <b>UwU Onichan 3000</b>
                        <p>Hola, Onichan!</p>
                        <div class="time">Hace 10 horas</div>
                      </div>
                    </a>
                  </div>
                  <div class="dropdown-footer text-center">
                    <a href="#">Ver Todos <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
              </li>
              <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                  <div class="dropdown-header">Notificaciones
                    <div class="float-right">
                      <a href="#">Marcar como Leido</a>
                    </div>
                  </div>
                  <div class="dropdown-list-content dropdown-list-icons">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                      <div class="dropdown-item-icon bg-primary text-white">
                        <i class="fas fa-code"></i>
                      </div>
                      <div class="dropdown-item-desc">
                        Nya ichi ni san Nya arigatou!
                        <div class="time text-primary">Hace 2 min</div>
                      </div>
                    </a>
                    <a href="#" class="dropdown-item">
                      <div class="dropdown-item-icon bg-info text-white">
                        <i class="fas fa-bell"></i>
                      </div>
                      <div class="dropdown-item-desc">
                        Bienvenido a TrailBrazer!
                        <div class="time">Ayer</div>
                      </div>
                    </a>
                  </div>
                  <div class="dropdown-footer text-center">
                    <a href="#">Ver Todos <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
              </li>
              <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{asset('images/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block"> {{ $authUser ? $authUser->nombre : 'Invitado' }} </div></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="dropdown-title">Logged in 5 min ago</div>
                  <a href="features-profile.html" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Perfil
                  </a>
                  <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Configuraciones
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   <i class="fas fa-sign-out-alt"></i> Salir
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
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
                    <li class="dropdown active">
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

          <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <!-- Aquí va el mapa -->
                        <aside id="sidebar-wrapper">
                            <ul class="sidebar-menu">
                                <li class="dropdown">
                                    <a href="#" class="nav-link"><span>Camion 1</span></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="nav-link"><span>Camion-2</span></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="nav-link"><span>Camion-3</span></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="nav-link"><span>Camion-4</span></a>
                                </li>
                            </ul>
                        </aside>
                        <div id="map"></div>
                    </div>
                </section>
            </div>

    <footer class="main-footer" style="margin-top: 250px;">
        <div class="footer-left">
            Copyright &copy; 2024 <div class="bullet"></div> TrailBrazer
        </div>
    </footer>
</div>
</div>
@endsection
