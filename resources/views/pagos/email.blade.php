<p>Hola {{ $user->nombre }},</p>
<p>Gracias por tu pago. Aquí está el comprobante:</p>
<p><strong>Plan:</strong> {{ $pago->subscripcion->tipo }}</p>
<p><strong>Monto:</strong> ${{ $pago->monto }}</p>
<p><strong>Fecha:</strong> {{ $pago->fecha }}</p>
<p><strong>Método:</strong> {{ $pago->metodo }}</p>
<p>Si tienes alguna pregunta, no dudes en contactarnos.</p>
