@extends('layouts.main')
@include('common.flash-messages')
@include('common.navbar')

@section('home')
    <div class="p-6 d-flex justify-content-center">
        <h1>Профвйл</h1>
    </div>
@endsection

@section('content')
    @yield('navbar')
    @yield('flash-messages')
    @yield('home')
@endsection
