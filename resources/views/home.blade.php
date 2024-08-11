<!DOCTYPE html>
<!--
### TIMID0x - 2023-09-25T10:46:16.000-05:00
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="TIMID0x: PokemonGO, TL50Data and more">
    <meta name="description"
        content="Try TL50Data, track your medals from PokemonGO with advanced stats. PvP Games, Blog, Friend codes, AR photos and more">
    <meta name="keywords" content="timid0x,TL50data,PokemonGO,AR,GOSnapshot,Blog,FriendCodes">
    <meta name="wot-verification" content="b163ac58f42ae0b0f594" />
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="1 days">
    <meta name="author" content="TIMID0x">

    <title>TIMID0x: PokemonGO, TL50Data and more</title>

    <!-- Favicon-->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicons/favicon.ico') }}">

    <!-- BS-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    <!-- Snow -->
    {{--     <script src="{{ asset('assets/js/snowstorm-min.js') }}"></script>
    <script>
        snowStorm.autoStart = true;
        snowStorm.excludeMobile = false;
        snowStorm.followMouse = true;
        snowStorm.freezeOnBlur = false;
        snowStorm.animationInterval = 50;
        snowStorm.flakesMaxActive = 64; // show more snow on screen at once
        snowStorm.useTwinkleEffect = true; // let the snow flicker in and out of view
    </script> --}}
    
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

    <!-- BING -->
    <script type="text/javascript">
        (function(c, l, a, r, i, t, y) {
            c[a] = c[a] || function() {
                (c[a].q = c[a].q || []).push(arguments)
            };
            t = l.createElement(r);
            t.async = 1;
            t.src = "https://www.clarity.ms/tag/" + i;
            y = l.getElementsByTagName(r)[0];
            y.parentNode.insertBefore(t, y);
        })(window, document, "clarity", "script", "isn4b9yu4p");
    </script>

    <!-- AOL Scroll -->
    <link href="{{ asset('assets/css/aos.css') }}" rel="stylesheet">

</head>

<body>

    <!-- Header-->
    <header class="sticky-top">
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img class="img-fluid flash m-2" src="{{ asset('assets/images/logo_n36bgc.png') }}" alt="TIMID0x"
                        width="75" height="75" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="/blog">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="/friendcode">Friend codes</a>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="/shop">Shop</a>
                        </li>

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


    <!-- Contenido-->

    <!-- About-->
    <section id="about" class="text-center">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8">
                    <h1 class="text-white mb-4 display-1"><strong>Oi!</strong></h1>

                    <p class="text-white">I'm trainer L50, based in Panama, Panama City
                        <img class="flag" src="{{ asset('assets/images/flagpanama_ceghlw_k1wjbx.webp') }}"
                            alt="TIMID0x" width="23" height="15" /><br>
                        If you join or return to Pokémon GO using my referral code <span class="h1font"><a
                                class="link-light link-offset-2 link-underline-opacity-0 link-underline-opacity-50-hover"
                                target="_blank"
                                href="https://pokemongolive.com/refer?code=9372WV78Y&source=INVITE_PAGE">CDPYF4778</a></span>
                        ,
                        you'll instantly get 100 Poké Balls, be able to earn special bonus items.
                    </p>

                </div>
            </div>

        </div>
    </section>

    <!-- Content section01-->
    <section id="section01">

        <div class="w3-animate-fading container px-5">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-3"><a href="/tl50data"><img class="img-fluid"
                                src="{{ asset('assets/images/pexels-nataliya-vaitkevich-6532600_o0rlsl.webp') }}"
                                alt="pexels-nataliya-vaitkevich-6532600" /></a></div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-3">
                        <h2 class="text-white"><a
                                class="link-light link-offset-2 link-underline-opacity-0 link-underline-opacity-50-hover"
                                href="/tl50data">#TL50Data</a></h2>
                        <p class="text-white">IS THE ESSENTIAL
                            PLATFORM FOR
                            TRAINERS!, track your medals with advanced stats.
                            Compete on leaderboards, connect with friends. See our <a
                                href="https://www.youtube.com/embed/sKN-UlueJnc"
                                class="link-light link-offset-2 link-underline-opacity-50 link-underline-opacity-75-hover"
                                target="_blank">demo
                            </a>
                        </p>
                        <div class="container">
                            <div class="col-md-12 text-center">
                                <a class="btn btn-secondary btn-lg mt-2" href="{{ url('/tl50data') }}">Sign Up
                                    Now <i class="fa-solid fa-chevron-right fa-beat-fade"></i></a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Content section02  https://www.flickr.com/gp/96223828@N06/2uc272oK99-->
    <section id="section02">
        <div data-aos="fade-up" data-aos-offset="10" data-aos-delay="10" data-aos-duration="700"
            data-aos-easing="ease-in-out" data-aos-once="true" data-aos-anchor-placement="top-center">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="p-3"><a href="https://photodex.io/timid0x"
                                target="_blank"><img class="img-fluid"
                                    src="{{ asset('assets/images/pexels-wallace-chuck-3744191_lywjxk_sxgum1.webp') }}"
                                    alt="..." /></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-3">
                            <h2 class="text-white"><a
                                    class="link-light link-offset-2 link-underline-opacity-0 link-underline-opacity-50-hover"
                                    href="https://photodex.io/timid0x"
                                    target="_blank">PhotoDex</a></h2>
                            <p class="text-white">Experience our tour like never before with captivating AR photos
                                showcasing stunning destinations. Explore now and be amazed! #GOSnapshot #TravelGoals...
                                Photódex is powered by Flickr's API</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content section03-->
    <section id="section03">
        <div data-aos="fade-up" data-aos-offset="10" data-aos-delay="10" data-aos-duration="700"
            data-aos-easing="ease-in-out" data-aos-once="true" data-aos-anchor-placement="top-center">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-3"><a href="/blog"> <img class="img-fluid"
                                    src="{{ asset('assets/images/pexels-negative-space-34587.webp') }}"
                                    alt="..." /></a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-3">
                            <h2 class="text-white"><a
                                    class="link-light link-offset-2 link-underline-opacity-0 link-underline-opacity-50-hover"
                                    href="/blog">Blog</a>
                            </h2>
                            <p class="text-white">Discover my articles on PokemonGO and more! Get insights and tips on
                                the popular game. Check them out now!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content section04-->
    <section id="section04">
        <div data-aos="fade-up" data-aos-offset="10" data-aos-delay="10" data-aos-duration="700"
            data-aos-easing="ease-in-out" data-aos-once="true" data-aos-anchor-placement="top-center">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="p-3"><a href="/friendcode"><img class="img-fluid"
                                    src="{{ asset('assets/images/pexels-tim-douglas-6205512.webp') }}"
                                    alt="..." /></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-3">
                            <h2 class="text-white"><a
                                    class="link-light link-offset-2 link-underline-opacity-0 link-underline-opacity-50-hover"
                                    href="/friendcode">Friend codes</a></h2>
                            <p class="text-white">Boost your PokemonGO experience! Share your trainer code on our
                                network and connect with fellow trainers. Join now!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content section05-->
    <section id="section05">
        <div data-aos="fade-up" data-aos-offset="10" data-aos-delay="10" data-aos-duration="700"
            data-aos-easing="ease-in-out" data-aos-once="true" data-aos-anchor-placement="top-center">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-3"><a href="https://www.youtube.com/@timid0x/videos" target="_blank"> <img
                                    class="img-fluid"
                                    src="{{ asset('assets/images/editing-7320119_Terrence_Phiri_from_Pixabay.jpg') }}"
                                    alt="..." /></a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-3">
                            <h2 class="text-white"><a
                                    class="link-light link-offset-2 link-underline-opacity-0 link-underline-opacity-50-hover"
                                    href="https://www.youtube.com/@timid0x/videos" target="_blank">Videos</a>
                            </h2>
                            <p class="text-white">Discover our Youtube Channel with a few awesome videos. Check them
                                out now and stay tuned for more exciting content!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br>

    <!-- END Contenido-->


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
    <!-- AOL Scrooll-->
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script>
        AOS.init();
    </script>


</body>

</html>
