@extends('layouts.home')

@section('title', 'Checkout')

@section('content')
<body data-spy="scroll" data-target="#ftco-navbar" data-offset="200">

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">TrailBlazer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>
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
    </nav>
    <!-- END nav -->

    <section class="ftco-cover ftco-slant" style="background-image: url(images/bg_3.jpg);" id="section-home">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center ftco-vh-100">
          <div class="col-md-10">
            <h1 class="ftco-heading ftco-animate">Gestiona tus flotas vehiculares!</h1>
          </div>
        </div>
      </div>
    </section>
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
        <div class="row">
        <div class="col-md bg-white p-5 m-2 text-center mb-2 ftco-animate">
            <div class="ftco-pricing">
            <h2>Estandar</h2>
            <p class="ftco-price-per text-center"><sup>$</sup><strong>25</strong><span>/mo</span></p>
            <ul class="list-unstyled mb-5">
                <li>Característica 1</li>
                <li>Característica 2</li>
                <li>Característica 3</li>
            </ul>
            <button class="btn btn-secondary btn-sm select-plan" data-plan-id="1">Seleccionar</button>
            </div>
        </div>
        <div class="col-md bg-white p-5 m-2 text-center mb-2 ftco-animate">
            <div class="ftco-pricing">
            <h2>Profesional</h2>
            <p class="ftco-price-per text-center"><sup>$</sup><strong>75</strong><span>/mo</span></p>
            <ul class="list-unstyled mb-5">
                <li>Característica 1</li>
                <li>Característica 2</li>
                <li>Característica 3</li>
            </ul>
            <button class="btn btn-secondary btn-sm select-plan" data-plan-id="2">Seleccionar</button>
            </div>
        </div>
        <div class="col-md bg-white p-5 m-2 text-center mb-2 ftco-animate">
            <div class="ftco-pricing">
            <h2>Silver</h2>
            <p class="ftco-price-per text-center"><sup>$</sup><strong>135</strong><span>/mo</span></p>
            <ul class="list-unstyled mb-5">
                <li>Característica 1</li>
                <li>Característica 2</li>
                <li>Característica 3</li>
            </ul>
            <button class="btn btn-secondary btn-sm select-plan" data-plan-id="3">Seleccionar</button>
            </div>
        </div>
        <div class="col-md bg-white p-5 m-2 text-center mb-2 ftco-animate">
            <div class="ftco-pricing">
            <h2>Platinum</h2>
            <p class="ftco-price-per text-center"><sup>$</sup><strong>215</strong><span>/mo</span></p>
            <ul class="list-unstyled mb-5">
                <li>Característica 1</li>
                <li>Característica 2</li>
                <li>Característica 3</li>
            </ul>
            <button class="btn btn-secondary btn-sm select-plan" data-plan-id="4">Seleccionar</button>
            </div>
        </div>
        </div>
        <div class="row justify-content-center mt-5">
        <div class="col-md-8 bg-white p-5 shadow-sm">
            <h3 class="text-center mb-4">Completar Suscripción</h3>
            <form id="checkoutForm" method="POST" action="{{ route('checkout') }}">
            @csrf
            <div class="form-group">
                <label for="selectedPlan">Plan Seleccionado</label>
                <input type="text" id="selectedPlan" name="plan" class="form-control" readonly required>
            </div>
            <div class="form-group">
                <label for="selectedPriceDisplay">Precio</label>
                <input type="text" id="selectedPriceDisplay" class="form-control" readonly>
                <!-- Campo oculto para enviar solo el valor numérico -->
                <input type="hidden" id="selectedPrice" name="price" required>
            </div>
            <div class="form-group">
                <label for="cardNumber">Número de Tarjeta</label>
                <div class="d-flex gap-2">
                <input type="text" class="form-control card-number" maxlength="4" required>
                <input type="text" class="form-control card-number" maxlength="4" required>
                <input type="text" class="form-control card-number" maxlength="4" required>
                <input type="text" class="form-control card-number" maxlength="4" required>
                </div>
                <input type="hidden" id="cardNumber" name="card_number">
            </div>
            <div class="form-group">
                <label>Fecha de Expiración</label>
                <div class="d-flex gap-2">
                    <input type="text" id="expiryMonth" name="expiry_month" class="form-control" maxlength="2" placeholder="MM" required>
                    <input type="text" id="expiryYear" name="expiry_year" class="form-control" maxlength="2" placeholder="AA" required>
                </div>
            </div>
            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" class="form-control" maxlength="3" placeholder="123" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Completar Pago</button>
            </form>
        </div>
        </div>
    </div>
    </section>

    <script>
        const planDetails = {
            1: { name: 'Estandar', displayPrice: '$25 / 1 mes', price: 25 },
            2: { name: 'Profesional', displayPrice: '$75 / 1 mes', price: 75 },
            3: { name: 'Silver', displayPrice: '$135 / 1 mes', price: 135 },
            4: { name: 'Platinum', displayPrice: '$215 / 1 mes', price: 215 },
        };

        // Asignar evento a cada botón de selección
        document.querySelectorAll('.select-plan').forEach(button => {
            button.addEventListener('click', function () {
                const planId = this.dataset.planId;
                const plan = planDetails[planId];

                if (plan) {
                    // Mostrar el nombre y el precio formateado en los campos visibles
                    document.getElementById('selectedPlan').value = plan.name;
                    document.getElementById('selectedPriceDisplay').value = plan.displayPrice;

                    // Guardar el precio numérico en un campo oculto para enviar al backend
                    document.getElementById('selectedPrice').value = plan.price;
                }

                // Desplazar suavemente a la sección del formulario
                const checkoutFormElement = document.getElementById('checkoutForm');
                checkoutFormElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
            });
        });

        // Manejar el envío del formulario
        document.getElementById('checkoutForm').addEventListener('submit', function (e) {
            // Consolidar el número de tarjeta de crédito
            const cardInputs = document.querySelectorAll('.card-number');
            const cardNumber = Array.from(cardInputs).map(input => input.value).join('');
            if (cardNumber.length !== 16) {
                alert('Por favor, ingrese un número de tarjeta válido de 16 dígitos.');
                e.preventDefault();
                return;
            }

            // Asignar el número completo al campo oculto antes de enviar
            document.getElementById('cardNumber').value = cardNumber;
        });
    </script>

    @endsection
