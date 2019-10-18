<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="shortcut icon" type="icon" href="assets/favicon.ico">
        <script src="https://kit.fontawesome.com/f5a250744a.js"></script>
    </head>
    <body>
        <div class="row row-height">
            <div class="col-md-6 vcenter order-sm-12" id="right-side">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}"></a>
                    @else
                        <a class="btn btn-outline-info float-right d-none d-lg-block m-2" id="login" href="{{ route('login') }}">Login</a><br>
                    @endauth
                @endif
                <!-- @if(Auth::check())
                <h2>You are signed in.<br>
                    <a href="{{ url('/home') }}">Click Here</a>
                </h2>
                @endif -->
                <h2>Join the fastest growing Social <br>MEOWdia😽</h2>
                <h2>See what’s happening in <br>the world right now </h2>
                    <h4>Join Twitter today.</h4>
                @if (Route::has('login'))
                <ul class="center">
                    @auth
                        <a href="{{ url('/home') }}">You Are Already Logged In. Click Here</a>
                    @else
                    <li class="btn btn-info col-6 mb-4" id="signup">
                        <a href="{{ route('login') }}">Login</a>
                    </li>
                        @if (Route::has('register'))
                    <li class="btn btn-info col-6" id="signup" >
                            <a href="{{ route('register') }}">Sign Up</a>
                    </li>
                        @endif
                    @endauth
                </ul>
                @endif
            </div>
            <div class="col-md-6 vcenter order-sm-1" id="left-side">
                <div class="">
                    <h2>You’re one step away from the shiny new Twitter.com</h2>
                    <h4>We’ve added tons of cool features, including …</h4>
                    <h3><i class="fas fa-hashtag"></i> Explore</h3>
                    <p>Get the latest Tweets, news, and videos in one place.</p>
                    <h3><i class="far fa-bookmark"></i> Bookmarks</h3>
                    <p>Save that interesting Tweet for later.</p>
                    <h3><i class="fas fa-user-edit"></i> Personalize</h3>
                    <p>Choose from new themes and more dark mode options.</p>
                </div>
            </div>
        </div>
    </body>
</html>
