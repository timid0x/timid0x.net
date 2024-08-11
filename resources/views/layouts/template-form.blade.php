<!DOCTYPE html>
<!--
### TIMID0x - 2023-09-15T09:41:57.000-05:00
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="TIMID0x: PokemonGO, TL50Data and more">
    <meta name="description"
        content="Organize your data by month and never lose track again. Don't let the loss of #tl40data bring you down. We've got you covered.">
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


    <!-- Yield Scripts Header-->
    @yield('script-header')

</head>

<body>

    <!-- Yield Contenido-->
    @yield('contenido')

    <!-- Footer-->
    <footer class="@yield('footer-fixed') container text-center py-4">
        <div class="container bg-white">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start"><small>&copy;
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
                    <p><small><a class="link-secondary text-decoration-none text-black"
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

    <!-- Yield Scripts Footers-->
    @yield('scripts-footer')

</body>

</html>
