@extends('layouts.formularios')

@section('title', 'Login')

@section('content')
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="{{ route('login.perform') }}" method="POST" autocomplete="off">
                    @csrf
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" name="email" required autocomplete="new-email">
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" required autocomplete="new-password">
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

                    <!-- Error message below the login button -->
                    @if ($errors->any())
                        <div class="error-messages">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{ $error }}
                                </div>
                            @endforeach
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </section>
</body>
@endsection
