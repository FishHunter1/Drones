@extends('layouts.home')

@section('title', 'Checkout')

@section('content')
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
  const planNames = {
    1: 'Estandar',
    2: 'Profesional',
  };

  document.querySelectorAll('.select-plan').forEach(button => {
    button.addEventListener('click', function () {
      const planId = this.dataset.planId;
      const planName = planNames[planId] || 'Desconocido';
      document.getElementById('selectedPlan').value = planName;
      window.scrollTo(0, document.querySelector('form').offsetTop);
    });
  });

  document.getElementById('checkoutForm').addEventListener('submit', function (e) {
    const cardInputs = document.querySelectorAll('.card-number');
    const cardNumber = Array.from(cardInputs).map(input => input.value).join('');
    if (cardNumber.length !== 16) {
      alert('Por favor, ingrese un número de tarjeta válido de 16 dígitos.');
      e.preventDefault();
      return;
    }
    document.getElementById('cardNumber').value = cardNumber;
  });
</script>
@endsection
