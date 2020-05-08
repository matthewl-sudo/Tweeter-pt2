<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- SEO Meta Tags-->
        <meta name="description" content="A Twitter clone, but better. It's Cat-theme and sylish" />
        <meta name="robots" content="index, follow"/>
        <title>Tweeter</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://kit.fontawesome.com/f5a250744a.js"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css
        <link href=" https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="shortcut icon" type="icon" href="images/cat-purr.ico">
    </head>
    <body>
        <header class="row row-height">
            <div class="col-md-6 vcenter order-md-12 right-side" id="">
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
                    <h4>Join Tweeter today.</h4>
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
            <div class="col-md-6 vcenter order-md-1 left-side" id="">
                <div class="">
                    <h2>You’re one step away from the shiny new Tweeter.com</h2>
                    <h4>We’ve added tons of cool features, including …</h4>
                    <h3><i class="fas fa-hashtag"></i> Explore</h3>
                    <p>Get the latest Tweets, news, and videos in one place.</p>
                    <h3><i class="far fa-bookmark"></i> Bookmarks</h3>
                    <p>Save that interesting Tweet for later.</p>
                    <h3><i class="fas fa-user-edit"></i> Personalize</h3>
                    <p>Choose from new themes and more dark mode options.</p>
                </div>
            </div>
        </header>
        <section class="row row-height" id="trigger1">
            <div class="col-md-6 vcenter right-side" id="">
                <div class="mt-3" id="reveal1">
                    <h4>Our Values</h4>
                    <h4>Our philanthropic mission is to reflect<p></p>
                        and augment the power<p></p>
                        of Tweeter and the talents of our<p></p>
                         employees through direct civic<p></p>
                        engagement, employee volunteerism,<p></p>
                        charitable contributions,<p></p>
                        in-kind donations, and by harnessing <p></p>
                        the Tweeter service for good.<p></p>
                        <img class="rounded img-fluid" src="https://waspwebsite-wpengine.netdna-ssl.com/wp-content/uploads/bfi_thumb/Cats-Infographic-Blog-Feature-Image-o1p2oxcndiw27zuvuljvebj1gdlkgctrkars7oybys.jpg"  alt="Cat Blog Info">
                    </h4>
                </div>
            </div>
            <div class="col-md-6 vcenter  left-side" id="">
                <div class="" id="reveal1">
                    <h4>Our Values</h4>
                    <h2>We believe in free expression and think</h2>
                    <h2>every voice has the power to impact the world.</h2>
                    <img class="rounded img-fluid" src="https://static.vecteezy.com/system/resources/previews/000/386/360/non_2x/vector-people-connected-and-networking.jpg"  alt="Network of People connected">

                </div>
            </div>
        </section>
        <section class="row row-height" id="reveal-elements">
            <div class="col-md-6 vcenter order-md-12 right-side" id="">
                <h2 class="box1 digit">Getting started is easy</h2>
                <h4 class="box1 digit">Find a bunch of things you love. <p></p>
                    And then find people to follow. <p></p>
                    That’s all you need to do to see and talk about what’s happening.<p></p>
                    <img class="rounded img-fluid" src="https://jbertho.files.wordpress.com/2014/03/social-media-explained-by-cute-cats_5127ca6880db9.png" alt="Social media expalin by cats">
                </h4>
            </div>
            <div class="col-md-6 vcenter order-md-1 left-side" id="">
                <div class="">
                    <h2 class="box1 digit">Our Feature-filled Web App Includes...</h2>
                    <h4 class="box1 digit"><strong>Infinite Scrolling</strong> for infinite fun</h4>
                    <h4 class="box1 digit"><strong>Gif Commenting,</strong> when words can convey your feelings</h4>
                    <h4 class="box1 digit"><strong>Instant Notifications</strong> to keep you staring at the screen</h4>
                    <iframe src="https://giphy.com/embed/atZII8NmbPGw0" alt="staring at phone gif" width="480" height="270" frameBorder="0" class="giphy-embed box1 digit" allowFullScreen></iframe>
                </div>
            </div>
        </section>
        <footer class="row row-height" id="trigger2">
            <div class="col-md-6 vcenter right-side" id="reveal2">
                <h2>What are you waiting for?</h2>
                <h1>Join Tweeter!</h1>
                <h3>See what everyone is talking about</h3>

                @if (Route::has('login'))
                <ul class="center">
                    @auth
                    @else
                        @if (Route::has('register'))
                    <li class="btn btn-info col-6 mb-5" id="signup" >
                            <a href="{{ route('register') }}">Sign Up</a>
                    </li>
                        @endif
                    @endauth
                </ul>
                @endif
                <img class="img-fluid mt-5" src="https://cdn.clipart.email/2c59fe699104c9b2722a174b9dad84a2_cat-black-silhouette-with-extended-tail-and-one-paw-to-front-svg-_800-800.svg" alt="">
            </div>
            <div class="col-md-6 vcenter left-side" id="reveal2">
                <div class="">
                    <h2>Tweeter Privacy Policy</h2>
                    <h4>We believe you should always know what data we collect <p></p>
                        from you and how we use it, and that you should have meaningful <p></p>
                        control over both. We want to empower you to make the best decisions <p></p>
                        about the information that you share with us. <p></p>
                    </h4>
                </div>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="/js/scrollmag-effects.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
    </body>
</html>
