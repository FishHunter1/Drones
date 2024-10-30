@extends('layouts.template2')

@section('title', 'Register')

@section('content')
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="">
                    <h2>Registro</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required>
                        <label for="">Password</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="confirm password" required>
                        <label for="">Confirm Password</label>
                    </div>
                    <button>Registrarse</button>
                </form>
            </div>
        </div>
    </section>
</body>
@endsection
