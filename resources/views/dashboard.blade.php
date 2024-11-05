@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')

<body data-spy="scroll" data-target="#ftco-navbar" data-offset="200">

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">TrailBlazer</a>
    </nav>
    <!-- END nav -->



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

@endsection
