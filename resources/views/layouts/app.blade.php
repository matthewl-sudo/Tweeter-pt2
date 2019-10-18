<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tweeter') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="icon" href="images/cat-purr.ico">
    <script src="https://kit.fontawesome.com/f5a250744a.js"></script>
</head>
<body>

    @if(auth::check())
    <div class="">
        <nav class=" sticky-top">
            <ul class="nav float-left flex-column">
                <li class="nav-item">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <i class="fas fa-cat ml-3"></i><span class="d-none d-md-inline d-lg-inline">{{ config(' app.name', ' Tweeter') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/home"><i class="fas fa-home"></i><span class="d-none d-md-inline d-lg-inline"> Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-hashtag"></i><span class="d-none d-md-inline d-lg-inline"> Explore</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-bell"></i><span class="d-none d-md-inline d-lg-inline"> Notifications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-envelope"></i><span class="d-none d-md-inline d-lg-inline"> Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profile"><i class="fas fa-user-circle"></i><span class="d-none d-md-inline d-lg-inline"> Profile</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></i><span class="d-none d-md-inline d-lg-inline"> More</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">User: {{ucwords(Auth::user()->name)}}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Analytics</a>
                        <a class="dropdown-item" href="#">Settings and Privacy</a>
                        <a class="dropdown-item" href="#">Help Center</a>
                        <div class="dropdown-divider"></div>
                        @guest
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        @endguest
                    </div>
                </li>
            </ul>
        </nav>
    @endif
        <main class="py-2 m-0">
            @yield('content')
            @yield('user-profile')
            @yield('edit-profile')
            <!-- @yield('sidebar') -->
        </main>
        <main class="py-2 m-0">
            @yield('edit-login')
        </main>

    </div>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
    @yield('scripts')
</body>
</html>
