@extends('layouts.home')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Comprobante de Pago</h3>
        </div>
        <div class="card-body">
            <p><strong>Usuario:</strong> {{ $user->nombre }} {{ $user->apellido }}</p>
            <p><strong>Plan:</strong> {{ $pago->subscripcion->tipo }}</p>
            <p><strong>Monto:</strong> ${{ $pago->monto }}</p>
            <p><strong>Fecha:</strong> {{ $pago->fecha }}</p>
            <p><strong>Método:</strong> {{ $pago->metodo }}</p>
        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        window.location.href = "{{ route('dashboard')}}";
    }, 5000); // Redirige después de 3 segundos
</script>
@endsection
