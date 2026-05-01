@extends('layouts.auth')
@section('title', 'Register')

@section('content')

    <h1>Register</h1>

    @if($errors->any() && !$errors->has('email') && !$errors->has('name') && !$errors->has('password'))
        <div class="alert alert-error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">
            <label for="name">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                class="{{ $errors->has('name') ? 'input-error' : '' }}"
                required autofocus>
            @if($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group row">
            <label for="email_address">E-Mail Address</label>
            <input
                type="email"
                id="email_address"
                name="email"
                value="{{ old('email') }}"
                class="{{ $errors->has('email') ? 'input-error' : '' }}"
                required>
            <small style="color:var(--muted);margin-top:5px;display:block;">
                Only DIU email allowed (@s.diu.edu.bd or @diu.edu.bd)
            </small>
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
            <label for="password_confirmation">Confirm Password</label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                required>
        </div>

        <div class="form-group row">
            <label class="checkbox-label">
                <input type="checkbox" name="remember"> Remember Me
            </label>
        </div>

        <div class="form-group row">
            <button type="submit" class="btn btn-primary">
                Register
            </button>
        </div>

    </form>


@endsection