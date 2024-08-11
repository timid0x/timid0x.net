<!DOCTYPE html>
<!--
### TIMID0x - 2024-08-04
-->

<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="TIMID0x: PokemonGO, TL50data and more">
    <meta name="description"
        content="Join TL50data and showcase your PokemonGO stats! Discover a new alternative to TL40data and level up your gaming experience. Try it now!">
    <meta name="keywords" content="timid0x,TL50data,TL40Data,Pokemon,PokemonGO,AR,GOSnapshot,Blog">
    <meta name="wot-verification" content="b163ac58f42ae0b0f594" />
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="1 days">
    <meta name="author" content="TIMID0x">


    <title>TL50data - @yield('title')</title>

    <!-- Favicon-->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicons/favicon.ico') }}">

    <!-- Color modes-->
    <script src="{{ asset('assets/js/color-modes.js') }}"></script>

    <!-- BS-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Flag Icons-->
    <link rel="stylesheet" href="{{ asset('assets/css/flag-icons.min.css') }}">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">

    <!-- Font Awesome icons (free version)-->
    <script src="https://kit.fontawesome.com/327a56441f.js" crossorigin="anonymous"></script>

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


</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path
                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path
                d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
            <path
                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path
                d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
        </symbol>
    </svg>



    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
            aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
            <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                <use href="#circle-half"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#sun-fill"></use>
                    </svg>
                    Light
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#moon-stars-fill"></use>
                    </svg>
                    Dark
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
                    aria-pressed="true">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#circle-half"></use>
                    </svg>
                    Auto
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
        </ul>
    </div>




    <header class="navbar bg-dark flex-md-nowrap p-0" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand m-2" href="/">
                <img src="{{ asset('assets/images/logo_n36bgc.png') }}" width="30" height="30"
                    class="img-fluid flash d-inline-block align-top" alt="">
                TL50data
            </a>

            <!-- Language Dropdown (Aligned to the Right) -->
            <div class="dropdown ml-auto m-2 position-relative">
                <a class="btn btn-dark btn-sm dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    @switch(Session::get('locale'))
                        @case('es')
                            <span class="fi fi-es"></span> ES
                        @break

                        @case('en')
                            <span class="fi fi-gb"></span> EN
                        @break

                        @case('pt_BR')
                            <span class="fi fi-br"></span> PT
                        @break

                        @default
                            Lang
                    @endswitch
                </a>

                <ul class="dropdown-menu" style="width: 100px;">
                    <li><a class="dropdown-item" href="{{ url('locale/en') }}"><span class="fi fi-gb"></span>
                            @if (Session::get('locale') === 'en')
                                English
                            @elseif (Session::get('locale') === 'es')
                                Inglés
                            @elseif (Session::get('locale') === 'pt_BR')
                                Inglês
                            @else
                                English
                            @endif
                        </a></li>
                    <li><a class="dropdown-item" href="{{ url('locale/es') }}"><span class="fi fi-es"></span>
                            @if (Session::get('locale') === 'en')
                                Spanish
                            @elseif (Session::get('locale') === 'es')
                                Español
                            @elseif (Session::get('locale') === 'pt_BR')
                                Espanhol
                            @else
                                Spanish
                            @endif
                        </a></li>
                    <li><a class="dropdown-item" href="{{ url('locale/pt_BR') }}"><span class="fi fi-br"></span>
                            @if (Session::get('locale') === 'en')
                                Portuguese
                            @elseif (Session::get('locale') === 'es')
                                Portugués
                            @elseif (Session::get('locale') === 'pt_BR')
                                Português
                            @else
                                Portuguese
                            @endif
                        </a></li>
                </ul>
            </div>

            <!-- Profile Dropdown -->
            <div class="btn-group">
                <button type="button" class="btn btn-secondary text-uppercase dropdown-toggle"
                    data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                    {{ substr(auth()->user()->name, 0, 2) }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">{{ __('Profile') }}</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{ url('/logout') }}">{{ __('Logout') }}</a></li>
                </ul>
            </div>


            <!-- Toggle Button for Mobile -->
            <ul class="navbar-nav flex-row d-md-none">
                <li class="nav-item text-nowrap">
                    <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                        aria-label="Toggle navigation">
                        {{-- add BI class --}}
                        <i class="bi fa-solid fa-bars"></i>
                    </button>
                </li>
            </ul>
        </div>
    </header>





    <div class="container-fluid">
        <div class="row">
            <div class="sidebar col-md-3 col-lg-2 p-0 bg-dark">
                <div class="offcanvas-md offcanvas-end bg-dark text-white" tabindex="-1" id="sidebarMenu"
                    aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="sidebarMenuLabel">TL50data</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                            data-bs-target="#sidebarMenu" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav nav-pills flex-column">

                            <li class="nav-item">
                                <a class="nav-link link-light d-flex align-items-center gap-2 @yield('dashboard-link')"
                                    aria-current="page" href="/main">
                                    <i class="fas fa-tachometer-alt"></i>
                                    {{ __('Dashboard') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-light d-flex align-items-center gap-2 @yield('leaderboard-link')"
                                    href="/leaderboard">
                                    <i class="fa-solid fa-trophy"></i>
                                    {{ __('Leaderboard') }}
                                </a>
                            </li>

                        </ul>

                        <h6
                            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-2 text-uppercase">
                            <span>Data</span>
                            <a class="text-white" href="#" aria-label="Add a new report">
                                <i class="fa-solid fa-sort-down"></i>
                            </a>
                        </h6>

                        <ul class="nav nav-pills flex-column mb-auto">
                            <li class="nav-item">
                                <a class="nav-link link-light d-flex align-items-center gap-2 @yield('medal-link')"
                                    href="{{ route('medal.show') }}">
                                    <i class="fa-solid fa-chevron-right"></i>
                                    {{ __('Medals') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-light d-flex align-items-center gap-2 @yield('medaltypes-link')"
                                    href="{{ route('medaltype.show') }}">
                                    <i class="fa-solid fa-chevron-right"></i>
                                    {{ __('Medals Types') }}
                                </a>
                            </li>
                            <hr class="my-3">

                            <li class="nav-item">
                                <a class="nav-link link-light d-flex align-items-center gap-2"
                                    aria-current="page" href="https://www.youtube.com/embed/sKN-UlueJnc" target="_blank">
                                    <i class="fa-solid fa-circle-info"></i>
                                    {{ __('Help') }}
                                </a>
                            </li>

                            <li class="nav-item">
                                <div class="text-secondary small m-2">
                                    {{ __('Logged in as') }}:
                                    {{ urlencode(auth()->user()->name) }}
                                </div>
                            </li>


                        </ul>



                    </div>
                </div>
            </div>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="">

                    <!-- Yield Contenido-->
                    @yield('contenido')


                </div>
            </main>

        </div>

        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top">
            <div class="col-md-4 d-flex align-items-center">
                &copy; {{ date('Y') }} -
                <a class="text-muted" href="{{ url('/privacy') }}" target="_blank">Terms</a>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-body-secondary" href="https://twitter.com/timid0x"
                        target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                <li class="ms-3"><a class="text-body-secondary" href="https://discord.gg/j3tRbeyxKm"
                        target="_blank"><i class="fa-brands fa-discord"></i></a></li>
                <li class="ms-3"><a class="text-body-secondary" href="https://www.instagram.com/timid0x"
                        target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                <li class="ms-3"><a class="text-body-secondary" href="mailto:timid0x.player@gmail.com"
                        target="_blank"><i class="fa-solid fa-envelope"></i></a></li>
                <li class="ms-3"><a class="text-body-secondary" href="https://ko-fi.com/timid0x"
                        target="_blank"><i class="fa-solid fa-mug-hot"></i></a></li>

            </ul>
        </footer>



    </div>
    <!-- BS-->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- JQUERY-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- Yield Scripts-->
    @yield('scripts')


</body>


</html>
