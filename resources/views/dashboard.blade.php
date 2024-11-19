@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

<body data-spy="scroll" data-target="#ftco-navbar" data-offset="200">
    <div id="app">
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
                      <img class="mr-3 rounded" width="30" src="images/products/product-3-50.png" alt="product">
                      Alvaro Alexa compralo ya!
                    </a>
                  </div>
                  <div class="search-item">
                    <a href="#">
                      <img class="mr-3 rounded" width="30" src="images/products/product-2-50.png" alt="product">
                      Niños haitianos a mitad de precio!
                    </a>
                  </div>
                  <div class="search-item">
                    <a href="#">
                      <img class="mr-3 rounded" width="30" src=images/products/product-1-50.png" alt="product">
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
                        <img alt="image" src="images/avatar/avatar-1.png" class="rounded-circle">
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
                <img alt="image" src="images/avatar/avatar-1.png" class="rounded-circle mr-1">
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
                  <a href="{{route('logout')}}" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Salir
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

          <!-- Main Content -->
          <div class="main-content">
            <section class="section">
              <div class="section-header">
                <h1>Dashboard</h1>
              </div>
              @if(auth()->check() && auth()->user()->rol->nombre == 'Administrador')
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Conductores</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $totalConductores }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="far fa-file"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Reportes</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $totalReportes }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="alert alert-info">
                    @if(auth()->check() && auth()->user()->rol->nombre == 'Administrador')
                        <h4 class="alert-heading">¡Bienvenido a TrailBrazer!</h4>
                        <p>Gracias por adquirir nuestro servicio. Estamos emocionados de tenerte con nosotros y de ayudarte a gestionar tu flota de vehículos de manera más eficiente. Para comenzar a sacar el máximo provecho a la plataforma, sigue estos sencillos pasos:</p>

                        <ul>
                            <li><strong>Configura tu perfil:</strong> Asegúrate de completar tu información personal, datos de contacto y preferencias para personalizar tu experiencia. Esto te ayudará a mantenerte organizado y comunicarte con tu equipo más fácilmente.</li>
                            <li><strong>Agrega tus vehículos:</strong> Registra los vehículos que utilizarás dentro de la aplicación. Puedes agregar fácilmente los detalles como la marca, modelo, placa, y tipo de combustible. Esto te permitirá gestionar cada vehículo de manera eficiente.</li>
                            <li><strong>Asigna conductores:</strong> Asigna conductores a los vehículos registrados. Asegúrate de que cada conductor esté asociado al vehículo adecuado para facilitar el seguimiento de las actividades y el mantenimiento.</li>
                            <li><strong>Comienza a gestionar:</strong> Accede a los reportes de mantenimiento, gestión de vehículos y reportes de incidentes. Desde aquí podrás mantener un seguimiento detallado de todos los eventos y actividades relacionadas con tu flota de vehículos.</li>
                            <li><strong>Realiza un seguimiento constante:</strong> Usa los reportes y estadísticas para monitorear el desempeño de tus vehículos y conductores. Aprovecha las alertas para programar mantenimientos preventivos y gestionar las tareas de forma proactiva.</li>
                            <li><strong>Optimiza tus operaciones:</strong> Con nuestra plataforma, podrás gestionar todos los aspectos relacionados con tu flota de manera centralizada y eficiente. No más papeleo, todo estará a solo un clic de distancia.</li>
                        </ul>

                        <p>Si en algún momento necesitas asistencia o tienes preguntas, no dudes en ponerte en contacto con nuestro equipo de soporte. Estamos aquí para ayudarte a sacar el máximo provecho de TrailBrazer y mejorar la gestión de tu flota.</p>

                        <hr>

                        <p class="mb-0">¡Gracias por elegir TrailBrazer! Tu éxito es nuestra prioridad. Estamos aquí para apoyarte en cada paso del camino.</p>
                    @endif

                    @if(auth()->check() && auth()->user()->rol->nombre == 'Conductor')
                    <h4 class="alert-heading">¡Bienvenido a TrailBrazer, Conductor!</h4>
                        <p>Gracias por unirte a nuestra plataforma. Estamos encantados de que seas parte de nuestro equipo de conductores y que puedas gestionar tus actividades y reportes de manera eficiente. Para comenzar a sacar el máximo provecho a la plataforma, sigue estos sencillos pasos:</p>

                        <ul>
                            <li><strong>Completa tu perfil:</strong> Asegúrate de tener todos tus datos personales y detalles de contacto actualizados para facilitar la comunicación y asignación de tareas.</li>
                            <li><strong>Revisa los vehículos asignados:</strong> Asegúrate de estar al tanto de los vehículos que se te han asignado para gestionar tu actividad diaria.</li>
                            <li><strong>Realiza reportes:</strong> Mantén un seguimiento detallado de los incidentes, mantenimientos y cualquier otra actividad relacionada con los vehículos a tu cargo. Puedes hacer reportes de mantenimiento o incidentes cuando sea necesario.</li>
                            <li><strong>Realiza un seguimiento constante:</strong> Accede a los reportes de actividades, mantenimientos y accidentes. Usa las estadísticas para monitorear tu desempeño y el estado de los vehículos.</li>
                        </ul>

                        <p>Si en algún momento necesitas asistencia o tienes preguntas, no dudes en ponerte en contacto con nuestro equipo de soporte. Estamos aquí para ayudarte a sacar el máximo provecho de TrailBrazer y a garantizar una gestión eficiente de la flota.</p>

                        <hr>

                        <p class="mb-0">¡Gracias por formar parte de TrailBrazer! Tu seguridad y desempeño son nuestra prioridad. Estamos aquí para apoyarte en cada paso del camino.</p>
                    @endif

                    @if(auth()->check() && auth()->user()->rol->nombre == 'Usuario')
                        <h4 class="alert-heading">¡Bienvenido a TrailBrazer!</h4>
                        <p>Gracias por registrarte con nosotros. Para que puedas comenzar a gestionar tu flota de vehículos y disfrutar de todas las funcionalidades de la plataforma, es necesario que completes tu suscripción.</p>

                        <ul>
                            <li><strong>Accede a la gestión de vehículos:</strong> Para agregar y gestionar vehículos dentro de la plataforma, es necesario que te suscribas a uno de nuestros planes.</li>
                            <li><strong>Asigna conductores:</strong> Asigna conductores a los vehículos, pero esto solo está disponible para los usuarios con suscripción activa.</li>
                            <li><strong>Accede a los reportes:</strong> Una vez que completes tu suscripción, podrás acceder a todos los reportes de mantenimiento, incidentes y desempeño de la flota.</li>
                        </ul>

                        <p><strong>¿Por qué suscribirse?</strong> Con la suscripción podrás gestionar tu flota de manera eficiente, mantener tus vehículos en perfecto estado y hacer un seguimiento detallado de cada aspecto relacionado con ellos. Sin suscripción, las funcionalidades se limitan y no podrás acceder a las herramientas completas de TrailBrazer.</p>

                        <p><strong>¿Cómo pagar?</strong> Dirígete a la sección de pagos en la plataforma y selecciona el plan que más te convenga. Una vez que completes el pago, tendrás acceso a todas las funcionalidades disponibles.</p>

                        <div class="alert alert-info">
                            <h4>¡No esperes más! Suscríbete ahora y comienza a gestionar tu flota sin limitaciones.</h4>
                            <p>Haz clic en el botón abajo para pagar y comenzar a disfrutar de todos los beneficios que TrailBrazer tiene para ofrecerte.</p>
                            <a href="/checkout" class="btn btn-success"><i class="fas fa-credit-card"></i> Pagar Suscripción</a>
                        </div>
                    @endif
                </div>
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
