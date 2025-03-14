@extends('layouts.main')
@include('common.flash-messages')
@include('common.navbar')

@section('reset-password-form')
    <div class="container py-5 container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-4">
                <h3 class="d-flex justify-content-between">
                    <span>{{ __('Заповніть поля форми') }}</span>
                </h3>
            </div>
        </div>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            {{--            <input type="hidden" name="token" value="{{ $request->route('token') }}">--}}
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-4">
                    <div class="form-floating mb-2">
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control form-control-lg @error('email') border-4 border-danger @enderror"
                            id="user-email"
                            placeholder="name@example.com"
                        >
                        <label for="user-email">Email</label>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-floating mb-2">
                        <input
                            type="password"
                            name="password"
                            class="form-control form-control-lg @error('password') border-4 border-danger @enderror"
                            id="user-password"
                            placeholder="Password"
                        >
                        <label for="user-password">{{ __('Пароль') }}</label>
                    </div>
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-floating mb-2">
                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control form-control-lg"
                            id="user-password-confirmation"
                            placeholder="Password"
                        >
                        <label for="user-password-confirmation">{{ __('Підтвердьте пароль') }}</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('Змінити пароль') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('content')
    @yield('navbar')
    @yield('flash-messages')
    @yield('reset-password-form')
@endsection


