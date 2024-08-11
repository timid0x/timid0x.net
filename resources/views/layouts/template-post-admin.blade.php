<!DOCTYPE html>
<!--
### TIMID0x - 2023-08-07T10:42:10.000-05:00
-->
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="TIMID0x: PokemonGO, TL50Data and more">
    <meta name="description"
        content="Try TL50Data, records your medals from PokemonGO with advanced stats. PvP Games, Blog, AR photos and more. Follow on social networks as @timid0x">
    <meta name="keywords" content="timid0x,TL50data,TL40Data,Pokemon,PokemonGO,AR,GOSnapshot,Blog">
    <meta name="wot-verification" content="b163ac58f42ae0b0f594" />
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="1 days">
    <meta name="author" content="TIMID0x">

    <title>TIMID0x - @yield('title')</title>

    <!-- Favicon-->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicons/favicon.ico') }}">

    <!-- BS-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles-main.css') }}">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5KXFJB9JS6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-5KXFJB9JS6');
    </script>

    <!-- TinyMCE-->
    <script src="https://cdn.tiny.cloud/1/63m0xs5y0ko4b8fwlr9wbzgi0j4i2ykpplcyakmmky4nyo5s/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <!-- Yield Scripts Header-->
    @yield('scripts-header')

</head>

<body>


    <!-- Header-->
    <header class="sticky-top">
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/"><img class="img-fluid flash m-2"
                        src="{{ asset('assets/images/logo_n36bgc.png') }}" alt="TIMID0x" width="75"
                        height="75" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/blog">Blog</a></li>

                        {{-- Dropdown Icon --}}
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    <div class="avatar">
                                        <span class="circle-singleline"><span
                                                class="initial-wrap"><span>{{ substr(auth()->user()->name, 0, 2) }}</span></span>
                                        </span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="{{ url('/main') }}">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/medal') }}">Medals</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ url('/logout') }}">Log
                                            out</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/tl50data') }}">TL50data</a>
                            </li>

                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

    </header>


    <!-- Yield Contenido-->
    @yield('contenido')

 


    <!-- Scripts-->
    <!-- JQUERY-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- BS-->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Yield Scripts Footers-->
    @yield('scripts-footer')

</body>

</html>
