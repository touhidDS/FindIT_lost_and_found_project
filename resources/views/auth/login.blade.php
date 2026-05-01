@extends('layouts.auth')
@section('title', 'Login')

@section('content')

    <h1>Login</h1>

    @if($errors->any())
        <div class="alert alert-error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group row">
            <label for="email_address">E-Mail Address</label>
            <input
                type="email"
                id="email_address"
                name="email"
                value="{{ old('email') }}"
                class="{{ $errors->has('email') ? 'input-error' : '' }}"
                required autofocus>
            @if($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group row">
            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                class="{{ $errors->has('password') ? 'input-error' : '' }}"
                required>
            @if($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group row">
            <label class="checkbox-label">
                <input type="checkbox" name="remember"> Remember Me
            </label>
        </div>

        <div class="form-group row">
            <button type="submit" class="btn btn-primary">
                Login
            </button>
        </div>

    </form>


@endsection