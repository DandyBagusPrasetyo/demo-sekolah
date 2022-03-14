<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="StorWize Roleplay Community">
        <meta name="keywords" content="SAMP, SA-MP, sa-mp, san andreas, SWRP, SW-RP, sw-rp, gta:sa, gta san andreas, gta sa">
        <meta name="author" content="StorWize">
        <title>SchoolMedia</title>

        {{-- Stylesheet --}}
        <link rel="stylesheet" href="{{asset('/vendor/bootstrap-4.5.3/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('/assets/css/social2.css')}}">
        <link rel="stylesheet" href="{{asset('/assets/master.css')}}">
        <link rel="stylesheet" href="{{asset('/vendor/lightbox/dist/ekko-lightbox.css')}}">

    </head>
    <body>
        {{-- Navbar --}}
        <header>
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('/assets/img/logo/swrp-logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                    SchoolMedia
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item-active">
                            <a class="nav-link" href="{{url('/')}}">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                    </ul>
                    @if (Route::has('login'))
                        <ul class="navbar-nav">
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/dashboard') }}">Dashboard</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                                </li>

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/register') }}">Register</a>
                                    </li>
                                @endif
                            @endauth
                        </ul>
                    @endif
                </div>
            </nav>
        </header>
        {{-- // Navbar --}}

        {{-- Yield Content --}}
        <main role="main">
            <div class="container">
                @yield('content')
            </div>
        </main>
        {{-- // Yield Content --}}

        {{-- Footer --}}
        <footer class="text-muted bg-light">
            <div class="container">
                <p>Copyright © 2022 SchoolMedia Test.</p>
                <div class="row">
                    <div class="one">
                        <a href="#" class="btn btn-facebook icon-only"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="btn btn-instagram icon-only"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="btn btn-youtube icon-only"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        {{-- // Footer --}}

        {{-- Javascript --}}
        <script type="text/javascript" src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/vendor/bootstrap-4.5.3/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('/vendor/lightbox/dist/ekko-lightbox.js')}}"></script>
        <script>
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
        </script>
    </body>
</html>
