@extends('layouts.template2')

@section('title', 'Login')

@section('content')
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="{{ route('login.perform') }}" method="POST">
                    @csrf
                    <h2>Login</h2>
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
                    <div class="forget">
                        <label for="">
                            <input type="checkbox" name="remember"> Remember Me
                            <a href="#">Forget Password</a>
                        </label>
                    </div>
                    <button type="submit">Log in</button>
                    <div class="register">
                        <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
@endsection
