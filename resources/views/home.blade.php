@extends('layouts.home')

@section('title', 'Home')

@section('content')

<body data-spy="scroll" data-target="#ftco-navbar" data-offset="200">

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">TrailBlazer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="#section-home" class="nav-link">Inicio</a></li>
            <li class="nav-item"><a href="#section-features" class="nav-link">Novedades</a></li>
            <li class="nav-item"><a href="#section-services" class="nav-link">Servicios</a></li>
            @if(auth()->check() && in_array(auth()->user()->rol->nombre, ['Administrador', 'Conductor']))
                <li class="nav-item"><a href="#section-pricing" class="nav-link">Suscripciones</a></li>
            @endif
            <li class="nav-item"><a href="#section-about" class="nav-link">About</a></li>
          </ul>
        </div>

        <div class="collapse navbar-collapse" id="ftco-navbar">
            <ul class="navbar-nav ml-auto">
                <!-- Si el usuario no está autenticado -->
                @guest
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                @endguest

                <!-- Si el usuario está autenticado -->
                @auth
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->nombre }} <i class="fas fa-caret-down"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>

        <!-- Formulario para logout -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </nav>
    <!-- END nav -->

    <section class="ftco-cover ftco-slant" style="background-image: url(images/bg_3.jpg);" id="section-home">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center ftco-vh-100">
          <div class="col-md-10">
            <h1 class="ftco-heading ftco-animate">Gestiona tus flotas vehiculares!</h1>
            <p class="nav-item">
                <a href="#section-services" class="btn btn-primary ftco-animate">Comenzar</a>
            </p>
          </div>
        </div>
      </div>
    </section>



    <section class="ftco-section bg-light  ftco-slant ftco-slant-white" id="section-features">
      <div class="container">

        <div class="row">
          <div class="col-md-12 text-center mb-5 ftco-animate">
            <h2 class="text-uppercase ftco-uppercase">Nuestras Características Destacadas</h2>
            <div class="row justify-content-center">
              <div class="col-md-7">
                <p class="lead">Descubre las funciones avanzadas que hacen de nuestro sistema la solución ideal para el monitoreo y la seguridad de vehículos en tiempo real.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="media d-block mb-4 text-center ftco-media p-md-5 p-4 ftco-animate">
              <div class="ftco-icon mb-3"><span class="oi oi-thumb-up display-4 text-muted"></span></div>
              <div class="media-body">
                <h5 class="mt-0">Interfaz Amigable</h5>
                <p class="mb-5">Nuestra página web está diseñada con una interfaz moderna y fácil de usar, ofreciendo una experiencia intuitiva para que accedas rápidamente a toda la información necesaria sobre nuestros servicios de monitoreo.</p>
                <p class="mb-0"><a href="#" class="btn btn-primary btn-sm">Más información</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="media d-block mb-4 text-center ftco-media p-md-5 p-4 ftco-animate">
              <div class="ftco-icon mb-3"><span class="oi oi-bolt display-4 text-muted"></span></div>
              <div class="media-body">
                <h5 class="mt-0">Carga Rápida</h5>
                <p class="mb-5">Nuestro sistema está optimizado para un rendimiento rápido, brindando actualizaciones en tiempo real con baja latencia para que siempre tengas los datos más recientes de tus vehículos.</p>
                <p class="mb-0"><a href="#" class="btn btn-primary btn-sm">Más información</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="media d-block mb-4 text-center ftco-media p-md-5 p-4 ftco-animate">
              <div class="ftco-icon mb-3"><span class="oi oi-person display-4 text-muted"></span></div>
              <div class="media-body">
                <h5 class="mt-0">Diseño y Desarrollo Profesional</h5>
                <p class="mb-5">Desarrollado por expertos en seguridad y monitoreo, nuestro sistema combina lo mejor del diseño y la tecnología para ofrecerte una solución completa y confiable</p>
                <p class="mb-0"><a href="#" class="btn btn-primary btn-sm">Más información</a></p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="media d-block mb-4 text-center ftco-media p-md-5 p-4 ftco-animate">
              <div class="ftco-icon mb-3"><span class="oi oi-code display-4 text-muted"></span></div>
              <div class="media-body">
                <h5 class="mt-0">Código Limpio</h5>
                <p class="mb-5">Nuestro equipo sigue las mejores prácticas de desarrollo para garantizar un código limpio y de alta calidad, lo que asegura un rendimiento robusto y una fácil escalabilidad del sistema.</p>
                <p class="mb-0"><a href="#" class="btn btn-primary btn-sm">LMás información</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="media d-block mb-4 text-center ftco-media p-md-5 p-4 ftco-animate">
              <div class="ftco-icon mb-3"><span class="oi oi-magnifying-glass display-4 text-muted"></span></div>
              <div class="media-body">
                <h5 class="mt-0">Optimización para Motores de Búsqueda</h5>
                <p class="mb-5">Hemos optimizado nuestra web para que encuentres toda la información relevante fácilmente y nuestra plataforma sea accesible y visible en búsquedas en línea.</p>
                <p class="mb-0"><a href="#" class="btn btn-primary btn-sm">Más información</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="media d-block mb-4 text-center ftco-media p-md-5 p-4 ftco-animate">
              <div class="ftco-icon mb-3"><span class="oi oi-phone display-4 text-muted"></span></div>
              <div class="media-body">
                <h5 class="mt-0">Completamente Adaptable</h5>
                <p class="mb-5">Disfruta de una experiencia fluida en cualquier dispositivo. Nuestro sistema y página web están diseñados para adaptarse perfectamente, ya sea en escritorio, tablet o móvil.</p>
                <p class="mb-0"><a href="#" class="btn btn-primary btn-sm">Más información</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="ftco-section ftco-slant" id="section-services">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center ftco-animate">
            <h2 class="text-uppercase ftco-uppercase">Nuestros Servicios</h2>
            <div class="row justify-content-center mb-5">
              <div class="col-md-7">
                <p class="lead">Descubre las herramientas avanzadas de monitoreo y seguridad que ofrecemos para una gestión de flotas segura y eficiente.</p>
              </div>
            </div>
          </div>
        </div>
        <!-- END row -->
        <div class="row">
          <div class="col-lg-4 mb-5 ftco-animate">
            <figure><img src="images/img_2.jpg" alt="aea" class="img-fluid"></figure>
            <div class="p-3">
              <h3 class="h4">Monitoreo en Tiempo Real</h3>
              <p class="mb-4">Mira en tiempo real la ubicación y el estado del vehículo a través de sensores GPS y drones que envían actualizaciones periódicas.</p>
              <ul class="list-unstyled ftco-list-check text-left">
                <li class="d-flex mb-2"><span class="oi oi-check mr-3 text-primary"></span> <span>Gestión precisa de flotas</span></li>
                <li class="d-flex mb-2"><span class="oi oi-check mr-3 text-primary"></span> <span>upervisión 24/7</span></li>
                <li class="d-flex mb-2"><span class="oi oi-check mr-3 text-primary"></span> <span>Mapas detallados y actualizados</span></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-4 mb-5 ftco-animate">
            <figure><img src="images/img_1.jpg" alt="aea" class="img-fluid"></figure>
            <div class="p-3">
              <h3 class="h4">Sistema de Alarmas</h3>
              <p class="mb-4">Se activa automáticamente en caso de intrusión o manipulación no autorizada y notifica el propietario del vehículo.</p>
              <ul class="list-unstyled ftco-list-check text-left">
                <li class="d-flex mb-2"><span class="oi oi-check mr-3 text-primary"></span> <span>Notificaciones en tiempo real</span></li>
                <li class="d-flex mb-2"><span class="oi oi-check mr-3 text-primary"></span> <span>Detección de movimiento sospechoso</span></li>
                <li class="d-flex mb-2"><span class="oi oi-check mr-3 text-primary"></span> <span>Personalización de alertas</span></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-4 mb-5 ftco-animate">
            <figure><img src="images/img_3.jpg" alt="aea" class="img-fluid"></figure>
            <div class="p-3">
              <h3 class="h4">Registro de Incidentes</h3>
              <p class="mb-4">Graba y almacena datos de monitoreo para ser consultados luego por los usuarios o autoridades en caso de robo o incidente.              </p>
              <ul class="list-unstyled ftco-list-check text-left">
                <li class="d-flex mb-2"><span class="oi oi-check mr-3 text-primary"></span> <span>Historial detallado de eventos</span></li>
                <li class="d-flex mb-2"><span class="oi oi-check mr-3 text-primary"></span> <span>Acceso rápido a registros</span></li>
                <li class="d-flex mb-2"><span class="oi oi-check mr-3 text-primary"></span> <span>Pruebas para reportes oficiales</span></li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </section>


    {{-- Parte Subscripciones --}}
    @if(auth()->check() && in_array(auth()->user()->rol->nombre, ['Administrador', 'Conductor']))
    <section class="ftco-section bg-light ftco-slant ftco-slant-white" id="section-pricing">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center ftco-animate">
              <h2 class="text-uppercase ftco-uppercase">Subscripciones</h2>
              <div class="row justify-content-center mb-5">
                <div class="col-md-7">
                  <p class="lead">Elige el plan que mejor se adapte a tus necesidades. Ofrecemos diferentes opciones de suscripción para que puedas acceder a nuestras herramientas de monitoreo y seguridad con la flexibilidad que necesitas.</p>
                </div>
              </div>
            </div>
          </div>
          <!-- END row -->

          @auth
            <!-- Si el usuario está logeado -->
            <div class="row">
              <div class="col-md bg-white p-5 m-2 text-center mb-2 ftco-animate">
                <div class="ftco-pricing">
                  <h2>Estandar</h2>
                  <p class="ftco-price-per text-center"><sup>$</sup><strong>25</strong><span>/mo</span></p>
                  <ul class="list-unstyled mb-5">
                    <li>Far far away behind the word mountains</li>
                    <li>Even the all-powerful Pointing has no control</li>
                    <li>When she reached the first hills</li>
                  </ul>
                  <p><a href="/checkout" class="btn btn-secondary btn-sm">Get Started</a></p>
                </div>
              </div>
              <div class="col-md bg-white p-5 m-2 text-center mb-2 ftco-animate">
                <div class="ftco-pricing">
                  <h2>Profesional</h2>
                  <p class="ftco-price-per text-center"><sup>$</sup><strong>75</strong><span>/mo</span></p>
                  <ul class="list-unstyled mb-5">
                    <li>Far far away behind the word mountains</li>
                    <li>Even the all-powerful Pointing has no control</li>
                    <li>When she reached the first hills</li>
                  </ul>
                  <p><a href="/checkout" class="btn btn-secondary btn-sm">Get Started</a></p>
                </div>
              </div>
              <div class="w-100 clearfix d-xl-none"></div>
              <div class="col-md bg-white  ftco-pricing-popular p-5 m-2 text-center mb-2 ftco-animate">
                <span class="popular-text">Popular</span>
                <div class="ftco-pricing">
                  <h2>Silver</h2>
                  <p class="ftco-price-per text-center"><sup>$</sup><strong class="text-primary">135</strong><span>/mo</span></p>
                  <ul class="list-unstyled mb-5">
                    <li>Far far away behind the word mountains</li>
                    <li>Even the all-powerful Pointing has no control</li>
                    <li>When she reached the first hills</li>
                  </ul>
                  <p><a href="/checkout" class="btn btn-primary btn-sm">Get Started</a></p>
                </div>
              </div>
              <div class="col-md bg-white p-5 m-2 text-center mb-2 ftco-animate">
                <div class="ftco-pricing">
                  <h2>Platinum</h2>
                  <p class="ftco-price-per text-center"><sup>$</sup><strong>215</strong><span>/mo</span></p>
                  <ul class="list-unstyled mb-5">
                    <li>Far far away behind the word mountains</li>
                    <li>Even the all-powerful Pointing has no control</li>
                    <li>When she reached the first hills</li>
                  </ul>
                  <p><a href="/checkout" class="btn btn-secondary btn-sm">Get Started</a></p>
                </div>
              </div>
            </div>
          @endauth
        </div>
      </section>
      @endif
    <section class="ftco-section ftco-slant ftco-slant-light" id="section-about">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-12 text-center ftco-animate">
            <h2 class="text-uppercase ftco-uppercase">Sobre Nosotros</h2>
            <div class="row justify-content-center mb-5">
              <div class="col-md-7">
                <p class="lead">Somos una empresa comprometida con la seguridad y eficiencia en la gestión de flotas. Nuestro sistema de monitoreo combina tecnología de punta para ofrecer control total y tranquilidad a nuestros clientes. <a href="">DataPulse@gmail.com</a></p>
              </div>
            </div>
          </div>
        </div>
        <!-- END row -->


        <div class="row no-gutters align-items-center ftco-animate">
          <div class="col-md-6 mb-md-0 mb-5">
            <img src="images/bg_3.jpg" alt="aea" class="img-fluid">
          </div>
          <div class="col-md-6 p-md-5">
            <h3 class="h3 mb-4">Nuestra Visión y Compromiso</h3>
            <p>En DataPulse Technologies, estamos comprometidos con la seguridad y eficiencia en la gestión de flotas de transporte. Nuestro sistema de monitoreo de última generación utiliza sensores avanzados de telemetría y drones para proporcionar información en tiempo real, permitiendo a nuestros usuarios tener un control total sobre sus vehículos y mejorar la logística de sus operaciones. Con TrailBlazer, buscamos innovar en la industria del transporte, promoviendo un entorno más seguro y sostenible.
                Descubre cómo nuestra tecnología transforma la forma en que gestionas y supervisas tus flotas. Con TrailBlazer, siempre estarás un paso adelante.</p>
            <p class="mb-5"><a href="#">Descubre Más</a></p>
          </div>
        </div>
        <div class="row no-gutters align-items-center ftco-animate">
          <div class="col-md-6 order-md-3 mb-md-0 mb-5">
            <img src="images/bg_1.jpg" alt="aea" class="img-fluid">
          </div>
          <div class="col-md-6 p-md-5 order-md-1">
            <h3 class="h3 mb-4">Transformando la Industria del Transporte</h3>
            <p>En DataPulse Technologies, nuestra tecnología de monitoreo permite visualizar y controlar cada aspecto de tus flotas de transporte desde cualquier lugar. Con soluciones en tiempo real impulsadas por sensores inteligentes y drones, aseguramos que cada vehículo esté donde debe estar, cuando debe estar. Nos esforzamos por brindar a nuestros clientes tranquilidad y eficiencia, minimizando riesgos y optimizando operaciones.
            Explora cómo TrailBlazer redefine la gestión de flotas con innovación y precisión.</p>
            <p class="mb-5"><a href="#">Descubre Más</a></p>
          </div>
        </div>

      </div>
    </section>
    <section class="ftco-section bg-light ftco-slant ftco-slant-white" id="section-counter">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 text-center ftco-animate">
            <h2 class="text-uppercase ftco-uppercase">Datos irrelevantes!</h2>
            <div class="row justify-content-center mb-5">
              <div class="col-md-7">
                <p class="lead">La humanidad es cada vez más sorprendente, y es muy importante para nosotros llevar un registro claro de sus mayores hazañas. Aquí hay algunos de sus acontecimientos más destacables expresados en cifras anuales.</p>
              </div>
            </div>
          </div>
        </div>
        <!-- END row -->
        <div class="row">
          <div class="col-md ftco-animate">
            <div class="ftco-counter text-center">
              <span class="ftco-number" data-number="40675">0</span>
              <span class="ftco-label">Libras de queso devoradas por persona</span>
            </div>
          </div>
          <div class="col-md ftco-animate">
            <div class="ftco-counter text-center">
              <span class="ftco-number" data-number="6803">0</span>
              <span class="ftco-label">Heridos por retretes</span>
            </div>
          </div>
          <div class="col-md ftco-animate">
            <div class="ftco-counter text-center">
              <span class="ftco-number" data-number="863">0</span>
              <span class="ftco-label">Patos de hule perdidos en el mar</span>
            </div>
          </div>
        </div>
      </div>

    </section>
    <footer class="ftco-footer ftco-bg-dark">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                  <h2 class="ftco-heading-2">Compañía</h2>
                  <ul class="list-unstyled">
                    <li><a href="#section-about" class="py-2 d-block">About</a></li>
                    <li><a href="#" class="py-2 d-block">Carreras</a></li>
                    <li><a href="#" class="py-2 d-block">Inversionistas</a></li>
                    <li><a href="#" class="py-2 d-block">Política de Privacidad</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md">
                 <div class="ftco-footer-widget mb-4">
                  <h2 class="ftco-heading-2">Comunidad</h2>
                  <ul class="list-unstyled">
                    <li><a href="#" class="py-2 d-block">Support</a></li>
                    <li><a href="#" class="py-2 d-block">Foro de Soporte</a></li>
                    <li><a href="#" class="py-2 d-block">Blog/Noticias</a></li>
                    <li><a href="#" class="py-2 d-block">Guías y Tutoriales</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="ftco-footer-widget mb-4">
              <ul class="ftco-footer-social list-unstyled float-md-right float-lft">
                <li><a href="https://twitter.com/AniTrendz/status/1850530389275672583"><span class="icon-twitter"></span></a></li>
                <li><a href="https://www.facebook.com/loquepasa.co/?locale=es_LA"><span class="icon-facebook"></span></a></li>
                <li><a href="https://www.instagram.com/ultimahora.noticias/?hl=es-la"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#4586ff"/></svg></div>

@endsection
