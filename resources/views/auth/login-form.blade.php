@extends('layouts.main')
@include('common.flash-messages')
@include('common.navbar')

@section('login-form')
    <div class="container py-5 container-fluid">
        <form method="POST" action="{{ route('login.process') }}">
            @csrf
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-4">
                    <h3 class="d-flex justify-content-between">
                        <span>{{ __('Вхід') }}</span>
                    </h3>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-4">
                    <div class="form-floating mb-2">
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control form-control-lg"
                            id="emailInput"
                            placeholder="name@example.com"
                        >
                        <label for="emailInput">Email</label>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-floating mb-2">
                        <input
                            type="password"
                            name="password"
                            class="form-control form-control-lg"
                            id="passwordInput"
                            placeholder="Password"
                        >
                        <label for="passwordInput">{{ __('Пароль') }}</label>
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" name="remember_me" value="remember-me"> {{ __('Запам\'ятати') }}
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('Увійти') }}</button>
                    <a class="w-100 btn btn-lg btn-success my-2"
                       href="{{ route('password.reset.form.email') }}">{{ __('Забули пароль') }}</a>
                    <a class="w-100 btn btn-lg btn-secondary"
                       href="{{ route('register.form') }}">{{ __('Реєстрація') }}</a>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('content')
    @yield('navbar')
    @yield('flash-messages')
    @yield('login-form')
@endsection
