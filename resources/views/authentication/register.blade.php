@extends('layout.main')

@section('content')

<div class="auth">
    <div class="auth__content">
        <h2>Sign up</h2>
        <div class="auth__errors">
            @foreach ($errors->all() as $error)
            <p>
                {{ $error }}
            </p>
            @endforeach
        </div>
        <form class="auth__form" action="{{ route('register') }}" method="post">
            @csrf

            <div class="auth__form__input">
                <label for="name">Name: </label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
            </div>

            <div class="auth__form__input">
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" value="{{ old('email') }}">
            </div>

            <div class="auth__form__input">
                <label for="pass">Password: </label>
                <input type="password" name="password" id="pass" value="">
            </div>
            <div class="auth__form__input">
                <label for="passConf">Confirm Password: </label>
                <input type="password" name="password_confirmation" id="passConf" value="">
            </div>
            <button class="auth__btn">Register</button>
        </form>

        <div class="auth__link">
            <p>Already have an account?</p>
            <a href="/login">
                Login here!
            </a>
        </div>
    </div>
</div>

@endsection