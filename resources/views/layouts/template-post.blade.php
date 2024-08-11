<!DOCTYPE html>
<!--
### TIMID0x - 2023-09-22T13:40:12.000-05:00
-->
<html lang="es" locale="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="wot-verification" content="b163ac58f42ae0b0f594" />
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="1 days">
    <meta name="author" content="TIMID0x">

    <title>TIMID0x - @yield('title')</title>

    <!-- Yield Scripts Header-->
    @yield('scripts-header')

    <!-- Favicon-->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicons/favicon.ico') }}">

    <!-- BS-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    <!-- ImageBOX -->
    <link rel="stylesheet" href="{{ asset('assets/css/imagebox.min.css') }}">

    <!-- Font Awesome icons (free version)-->
    <script src="https://kit.fontawesome.com/327a56441f.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&family=Kalam:wght@700&display=swap"
        rel="stylesheet">

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

    <!-- Google ADS -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1614107272938237"
        crossorigin="anonymous"></script>

    <!-- BEGIN SHAREAHOLIC CODE -->
    <link rel="preload" href="https://cdn.shareaholic.net/assets/pub/shareaholic.js" as="script" />
    <meta name="shareaholic:site_id" content="9efa569742adadd94432d0d2d473a70a" />
    <script data-cfasync="false" async src="https://cdn.shareaholic.net/assets/pub/shareaholic.js"></script>
    <!-- END SHAREAHOLIC CODE -->



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
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="/friendcode">Friend codes</a></li>
			<li class="nav-item"><a class="nav-link" aria-current="page" href="/shop">Shop</a></li>

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

    <!-- Footer-->
    <footer class="text-center py-4">
        <div class="container bg-dark">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start text-white">
                    <small>&copy;
                            {{ date('Y') }} - Join our
                            social networks at <span class="h1font">&#64;timid0x</span></small>
                </div>
                <div class="col-lg-4 my-1 my-lg-0">
                    <a class="btn btn-dark btn-social mx-1 text-white" href="https://twitter.com/timid0x"
                        aria-label="Twitter" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-1 text-white" href="https://discord.gg/j3tRbeyxKm"
                        aria-label="Discord" target="_blank"><i class="fa-brands fa-discord"></i></a>
                    <a class="btn btn-dark btn-social mx-1 text-white" href="https://www.instagram.com/timid0x"
                        aria-label="Instagram" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a class="btn btn-dark btn-social mx-1 text-white" href="mailto:timid0x.player@gmail.com"
                        aria-label="Email" target="_blank"><i class="fa-solid fa-envelope"></i></a>
                    <a class="btn btn-dark btn-social mx-1 text-white" href="https://ko-fi.com/timid0x"
                        aria-label="Coffee" target="_blank"><i class="fa-solid fa-mug-hot"></i></a>

                </div>
                <div class="col-lg-4 text-lg-end">
                    <p><small><a class="link-secondary text-decoration-none text-gray"
                        href="{{ url('/privacy') }}">Privacy
                        policy &
                        Terms of use</a></small></p>
                    

                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts-->
    <!-- JQUERY-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- BS-->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <!-- BS-->
        <script src="{{ asset('assets/js/imagebox.min.js') }}"></script>

    <!-- Yield Scripts Footer-->
    @yield('scripts-footer')


</body>

</html>
