@extends('layouts.template')

@section('title', 'Login')

@section('content')
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <input type="email" required></input>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <input type="password" required></input>
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Remember Me</label>
                        <a href="#">Forgot Password?</a>
                    </div>
                    <button>Log in</button>
                    <div class="Register">
                        <p>Don't have a account <a href="{{route('Dron.register')}}">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
@endsection
