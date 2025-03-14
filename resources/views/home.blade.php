@extends('layouts.main')
@include('common.flash-messages')
@include('common.navbar')

@section('home')
    <div>
        XXXXXXXXXXXXXXX
    </div>
@endsection

@section('content')
    @yield('navbar')
    @yield('flash-messages')
    @yield('home')
@endsection
