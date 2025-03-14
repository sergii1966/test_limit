@extends('backend.layouts.main-backend')
@include('backend.common.flash-messages')
@include('backend.common.navbar')

@section('register-form')
    <div class="container py-5 container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-4">
                <h3 class="d-flex justify-content-between">
                    <span>{{ __('Реєстрація') }}</span>
                </h3>
            </div>
        </div>
        <form method="POST" action="{{ route('admin.register.process') }}">
            @csrf
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-4">
                    <div class="form-floating mb-2">
                        <input
                               type="text"
                               name="name"
                               value="{{ old('name') }}"
                               class="form-control form-control-lg @error('name') border-4 border-danger @enderror"
                               id="user-name"
                               placeholder="name"
                        >
                        <label for="user-name">{{ __('Ім`я') }}</label>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
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
                    <div class="form-floating mb-2">
                        <input
                                type="password"
                                name="password"
                                class="form-control form-control-lg @error('password') border-4 border-danger @enderror"
                                id="user-password"
                               placeholder="Password"
                        >
                        <label for="user-password">Password</label>
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
                    <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('Реєстрація') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('content')
    @yield('navbar')
    @yield('flash-messages')
    @yield('register-form')
@endsection
