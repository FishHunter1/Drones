@extends('layouts.formularios')

@section('title', 'Register')

@section('content')
<body>
    <section>
        <div class="form-box-reactive">
            <div class="form-value">
                <form action="{{ route('register.store') }}" method="POST" autocomplete="off">
                    @csrf
                    <h2>Registro</h2>

                    <!-- Campos del formulario -->
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="nombre" value="{{ old('nombre') }}" required>
                        <label for="">Nombre</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="apellido" value="{{ old('apellido') }}" required>
                        <label for="">Apellido</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="home-outline"></ion-icon>
                        <input type="text" name="direccion" value="{{ old('direccion') }}" required>
                        <label for="">Dirección</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="call-outline"></ion-icon>
                        <input type="tel" name="telefono" value="{{ old('telefono') }}" required>
                        <label for="">Teléfono</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" value="{{ old('email') }}" required>
                        <label for="">Email</label>
                    </div>
                    <!-- Mostrar el error debajo del campo de email -->
                    @if ($errors->has('email'))
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    @endif
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

                    <div class="register">
                        <p>¿Ya tienes cuenta? <a href="{{ route('login') }}">Iniciar sesión</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
@endsection
