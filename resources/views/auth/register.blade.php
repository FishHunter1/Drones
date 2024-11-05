@extends('layouts.template2')

@section('title', 'Register')

@section('content')
<body>
    <section>
        <div class="form-box-reactive">
            <div class="form-value">
                <form action="{{ route('register.store') }}" method="POST">
                    @csrf
                    <h2>Registro</h2>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="nombre" required>
                        <label for="">Nombre</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="apellido" required>
                        <label for="">Apellido</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="home-outline"></ion-icon>
                        <input type="text" name="direccion" required>
                        <label for="">Dirección</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="call-outline"></ion-icon>
                        <input type="tel" name="telefono" required>
                        <label for="">Teléfono</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" required>
                        <label for="">Password</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password_confirmation" required>
                        <label for="">Confirm Password</label>
                    </div>
                    <button type="submit">Registrarse</button>
                </form>
            </div>
        </div>
    </section>
</body>
@endsection
