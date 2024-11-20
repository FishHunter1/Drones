@extends('layouts.home')

@section('content')
<div class="container text-center mt-5">
    <h1>¡Pago confirmado!</h1>
    <p>Gracias por tu pago. Estamos procesando tu comprobante.</p>
    <p>Serás redirigido en unos segundos...</p>
</div>

<script>
    setTimeout(function() {
        window.location.href = "{{ route('payment.receipt', ['pago' => $pagoId]) }}";
    }, 3000); // Redirige después de 3 segundos
</script>
@endsection
