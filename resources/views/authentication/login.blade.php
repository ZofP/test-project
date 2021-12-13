@extends('layout.main')

@section('content')

<div class="auth">
    <div class="auth__content">
        <h2>Login</h2>
        <div class="auth__errors">
            @foreach ($errors->all() as $error)
            <p>
                {{ $error }}
            </p>
            @endforeach
        </div>
        <form class="auth__form" action="{{ route('login') }}" method="post">
            @csrf

            <div class="auth__form__input">
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" value="{{ old('email') }}">
            </div>

            <div class="auth__form__input">
                <label for="pass">Password: </label>
                <input type="password" name="password" id="pass" value="">
            </div>

            <button class="auth__btn">Login</button>
        </form>

        <div class="auth__link">
            <p>You do not have an account?</p>
            <a href="/register">
                Register here!
            </a>
        </div>
    </div>
</div>

@endsection