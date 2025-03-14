@extends('layouts.main')
@include('common.flash-messages')
@include('common.navbar')

@section('reset-password-email-form')
    <div class="container py-5 container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-4">
                <h3 class="d-flex justify-content-between">
                    <span>{{ __('Відновлення паролю') }}</span>
                </h3>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-4">
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Забули пароль? Немає проблем. Просто повідомте нам свою електронну адресу, і ми надішлемо вам електронною поштою посилання для скидання пароля, за яким ви зможете вибрати новий.') }}
                </div>
            </div>
        </div>
        @session('status')
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-4">
                <div class="mb-4 text-danger">
                    {{ $value }}
                </div>
            </div>
        </div>
        @endsession
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
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
                        <label for="user-email">Email address</label>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('Відправити') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('content')
    @yield('navbar')
    @yield('flash-messages')
    @yield('reset-password-email-form')
@endsection
