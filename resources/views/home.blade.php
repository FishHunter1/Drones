@extends('layouts.template')


@section('title', 'Home')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">TrailBlazer</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
<div class="container">
    <div class="row">

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-5">
                    <a href=""#">
                        <img class="card-img-top"
                        src="https://i.natgeofe.com/n/18708334-6fce-40b5-ade6-a7e2db7035f2/01-goldfish-nationalgeographic_1567132.jpg">
                    </a>
                    <div class="card-body text-center">
                        <div class="card-title">
                            aea
                        </div>
                        <p>aea</p>
                        <button class="btn btn-warning">Agregar al carrito</button>
                    </div>
                </div>
            </div>
    </div>
    "#"
</div>
@endsection
