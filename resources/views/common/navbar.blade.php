@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
        <div class="container-fluid">
            <a class="navbar-brand text-warning" href="#">{!! config('app.name') !!}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link @if(Route::is('home')) active @endif" aria-current="page"
                           href="{{ route('home') }}">{{ __('Головна') }}</a>
                    </li>


                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        @if(auth('web')->check())
                            <a class="nav-link" href="{{ route('login.out.process') }}">{{ __('Вийти') }}</a>
                        @else
                            <a class="nav-link" href="{{ route('login.form') }}">{{ __('Увійти') }}</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection
