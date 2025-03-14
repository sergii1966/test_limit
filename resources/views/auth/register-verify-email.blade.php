@extends('backend.layouts.main-backend')
@include('backend.common.flash-messages')
@include('backend.common.navbar')

@section('verify-email')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-4 my-4 text-sm text-gray-600 text-center">
                {{ __('Перш ніж продовжити, чи могли б ви підтвердити свою електронну адресу, натиснувши посилання, яке ми щойно надіслали вам? Якщо ви не отримали листа, ми з радістю надішлемо вам інший.') }}
            </div>
        </div>
        @if (session('status-verification-link-sent') == 'verification-link-sent')
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-4 mb-4 font-medium text-sm text-green-600 text-center text-danger">
                    {{ __('Нове посилання для підтвердження надіслано на електронну адресу, яку ви вказали в налаштуваннях профілю.') }}
                </div>
            </div>
        @endif
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-4">
                <form method="POST" action="{{ route('admin.verification.send') }}">
                    @csrf
                    <div class="text-center">
                        <button class="btn btn-lg btn-success"
                                type="submit">{{ __('Повторно надіслати електронний лист для підтвердження') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @yield('navbar')
    @yield('flash-messages')
    @yield('verify-email')
@endsection

