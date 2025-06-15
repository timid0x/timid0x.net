<!DOCTYPE html>
<!--
### TIMID0x - Mobile Optimized - 2025-06-15
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
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicons/favicon.png') }}">

    <!-- BS-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    <!-- Font Awesome icons (free version)-->
    <script src="https://kit.fontawesome.com/327a56441f.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&family=Kalam:wght@700&family=Poppins:wght@300;400;600&display=swap"
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

    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }
        
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                        url('{{ asset("assets/images/pokemon-go-bg.jpg") }}');
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            margin-bottom: 50px;
        }
        
        .section-title {
            font-family: 'Kalam', cursive;
            font-size: 2.5rem;
            margin-bottom: 30px;
            position: relative;
            display: inline-block;
            color: #fff;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            width: 50%;
            height: 3px;
            bottom: -10px;
            left: 25%;
            background: linear-gradient(90deg,#fe8c00 ,#f83600 );
            border-radius: 3px;
        }
        
        .feature-card {
            background: rgba(30, 30, 30, 0.8);
            border-radius: 15px;
            padding: 30px;
            height: 100%;
            transition: transform 0.3s ease;
            border: 1px solid #484848;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(120, 200, 80, 0.2);
            border-color: #78C850;
        }
        
        .btn-pokemon {
            background: linear-gradient(135deg, #78C850, #48B848);
            border: none;
            font-weight: 600;
            letter-spacing: 1px;
            padding: 12px 30px;
            border-radius: 50px;
            transition: all 0.3s;
            color: #fff;
            text-shadow: 0 1px 1px rgba(0,0,0,0.2);
            white-space: nowrap;
        }
        
        .btn-pokemon:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(120, 200, 80, 0.4);
            color: #fff;
        }
        
        .referral-code {
            background: rgba(120, 200, 80, 0.1);
            border: 2px dashed #78C850;
            padding: 10px 20px;
            border-radius: 10px;
            display: inline-block;
            margin: 10px 0;
        }
        
        .text-pokemon-green {
            color: #78C850;
        }
        
        .bg-pokemon-dark {
            background-color: #282828;
        }

        /* Testimonial Circle Images */
        .testimonial-card .rounded-circle {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border: 2px solid #78C850;
        }

        /* Mobile Styles */
        @media (max-width: 768px) {
            .hero-section {
                padding: 80px 0;
            }
            
            .hero-section h1 {
                font-size: 2.8rem;
            }
            
            .section-title {
                font-size: 2rem;
                margin: 1.5rem 0;
            }
            
            .section-title:after {
                width: 70%;
                left: 15%;
            }
            
            .feature-card {
                padding: 1.5rem;
                margin-bottom: 1.5rem;
            }
            
            .feature-card .row {
                flex-direction: column;
            }
            
            .feature-card .col-md-5,
            .feature-card .col-md-7 {
                width: 100%;
                max-width: 100%;
                padding: 0;
            }
            
            .feature-card img {
                margin-bottom: 1.25rem;
                width: 100%;
                max-height: 200px;
                object-fit: cover;
            }
            
            .feature-card h3 {
                font-size: 1.3rem;
                margin-bottom: 0.75rem;
            }
            
            .feature-card p {
                font-size: 0.95rem;
                margin-bottom: 1.25rem;
            }
            
            .btn-pokemon {
                padding: 0.75rem 1.5rem;
                font-size: 0.9rem;
                display: inline-block;
                width: auto;
            }
            
            .testimonial-card {
                margin-bottom: 1.5rem;
            }
            
            .row.g-4 {
                row-gap: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .hero-section {
                padding: 60px 0;
            }
            
            .hero-section h1 {
                font-size: 2.2rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
            
            .feature-card {
                padding: 1.25rem;
            }
            
            .feature-card img {
                margin-bottom: 1rem;
                max-height: 180px;
            }
            
            .feature-card h3 {
                font-size: 1.2rem;
            }
            
            .feature-card p {
                font-size: 0.9rem;
                margin-bottom: 1rem;
            }
            
            .referral-code {
                padding: 8px 15px;
            }
            
            .row.g-4 {
                row-gap: 1rem;
            }
        }
    </style>
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

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8">
                    <h1 class="text-white mb-4 display-1"><strong>Welcome Trainer!</strong></h1>
                    <p class="text-white lead mb-5">Level up your Pokémon GO experience with advanced tools, community features, and exclusive content</p>
                    
                    <div class="referral-code">
                        <p class="text-white mb-2">Use my referral code for bonus rewards:</p>
                        <h3 class="text-pokemon-green">
                            <a class="link-success link-offset-2 link-underline-opacity-0 link-underline-opacity-50-hover" 
                               target="_blank" 
                               href="https://pokemongolive.com/refer?code=9372WV78Y&source=INVITE_PAGE">
                                CDPYF4778
                            </a>
                        </h3>
                        <small class="text-white">Get 100 Poké Balls and special bonus items!</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title text-center mb-4 mb-md-5">Explore Our Features</h2>
            
            <div class="row g-4">
                <!-- TL50Data -->
                <div class="col-12 col-md-6">
                    <div class="feature-card" data-aos="fade-up">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-5 mb-3 mb-md-0">
                                <a href="/tl50data">
                                    <img class="img-fluid rounded w-100" 
                                         src="{{ asset('assets/images/pexels-nataliya-vaitkevich-6532600_o0rlsl.webp') }}" 
                                         alt="TL50Data Dashboard">
                                </a>
                            </div>
                            <div class="col-12 col-md-7">
                                <h3 class="text-white mt-2 mt-md-0">TL50Data</h3>
                                <p class="text-white-50">The ultimate platform for dedicated Pokémon GO trainers. Track your medal progress with advanced analytics, compete on leaderboards, and connect with friends.</p>
                                <a href="{{ url('/tl50data') }}" class="btn btn-pokemon">
                                    Get Started <i class="fa-solid fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- PhotoDex -->
                <div class="col-12 col-md-6">
                    <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-5 mb-3 mb-md-0">
                                <a href="https://photodex.io/timid0x" target="_blank">
                                    <img class="img-fluid rounded w-100" 
                                         src="{{ asset('assets/images/pexels-wallace-chuck-3744191_lywjxk_sxgum1.webp') }}" 
                                         alt="PhotoDex Collection">
                                </a>
                            </div>
                            <div class="col-12 col-md-7">
                                <h3 class="text-white mt-2 mt-md-0">PhotoDex</h3>
                                <p class="text-white-50">Showcase your best AR photos and explore stunning captures from trainers worldwide. Powered by Flickr's API for the ultimate Pokémon photography experience.</p>
                                <a href="https://photodex.io/timid0x" target="_blank" class="btn btn-pokemon">
                                    View Gallery <i class="fa-solid fa-camera ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Blog -->
                <div class="col-12 col-md-6">
                    <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-5 mb-3 mb-md-0">
                                <a href="/blog">
                                    <img class="img-fluid rounded w-100" 
                                         src="{{ asset('assets/images/pexels-negative-space-34587.webp') }}" 
                                         alt="Blog Articles">
                                </a>
                            </div>
                            <div class="col-12 col-md-7">
                                <h3 class="text-white mt-2 mt-md-0">Trainer's Blog</h3>
                                <p class="text-white-50">Get the latest Pokémon GO strategies, event breakdowns, and gameplay tips from an experienced Level 50 trainer based in Panama City.</p>
                                <a href="/blog" class="btn btn-pokemon">
                                    Read Articles <i class="fa-solid fa-book-open ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Friend Codes -->
                <div class="col-12 col-md-6">
                    <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-5 mb-3 mb-md-0">
                                <a href="/friendcode">
                                    <img class="img-fluid rounded w-100" 
                                         src="{{ asset('assets/images/pexels-tim-douglas-6205512.webp') }}" 
                                         alt="Friend Codes Network">
                                </a>
                            </div>
                            <div class="col-12 col-md-7">
                                <h3 class="text-white mt-2 mt-md-0">Friend Network</h3>
                                <p class="text-white-50">Expand your Pokémon GO friend list globally! Share your trainer code, coordinate gift exchanges, and build your international trainer network.</p>
                                <a href="/friendcode" class="btn btn-pokemon">
                                    Find Friends <i class="fa-solid fa-user-plus ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- YouTube Section -->
    <section class="py-5 bg-pokemon-dark" id="youtube-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-1 order-2">
                    <h2 class="section-title mb-4">Watch Our Videos</h2>
                    <p class="text-white-50 mb-4">Subscribe to our YouTube channel for gameplay tutorials, event guides, and creative Pokémon GO content. Perfect for trainers looking to enhance their skills!</p>
                    <a href="https://www.youtube.com/@timid0x/videos" target="_blank" class="btn btn-pokemon">
                        Visit Channel <i class="fa-brands fa-youtube ms-2"></i>
                    </a>
                </div>
                <div class="col-lg-6 order-lg-2 order-1 mb-4 mb-lg-0">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/sKN-UlueJnc" title="YouTube video" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title text-center mb-4 mb-md-5">What Trainers Say</h2>
            
            <div class="row">
                <div class="col-md-4 mb-4" data-aos="fade-up">
                    <div class="feature-card h-100 testimonial-card">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" 
                                 class="rounded-circle" 
                                 width="50" 
                                 height="50"
                                 alt="Trainer">
                            <div class="ms-3">
                                <h5 class="text-white mb-0">Ashley K.</h5>
                                <small class="text-pokemon-green">Level 47 Trainer</small>
                            </div>
                        </div>
                        <p class="text-white-50">"TL50Data completely transformed how I track my progress. The medal analytics helped me optimize my gameplay to reach Level 50 faster!"</p>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card h-100 testimonial-card">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://randomuser.me/api/portraits/men/45.jpg" 
                                 class="rounded-circle" 
                                 width="50" 
                                 height="50"
                                 alt="Trainer">
                            <div class="ms-3">
                                <h5 class="text-white mb-0">Miguel R.</h5>
                                <small class="text-pokemon-green">PvP Enthusiast</small>
                            </div>
                        </div>
                        <p class="text-white-50">"The blog's Battle League guides helped me reach Legend rank for the first time. The detailed team compositions are game-changers!"</p>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card h-100 testimonial-card">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" 
                                 class="rounded-circle" 
                                 width="50" 
                                 height="50"
                                 alt="Trainer">
                            <div class="ms-3">
                                <h5 class="text-white mb-0">Sophia L.</h5>
                                <small class="text-pokemon-green">AR Photographer</small>
                            </div>
                        </div>
                        <p class="text-white-50">"PhotoDex is my favorite place to showcase my Pokémon GO snapshots. The community feedback has helped me improve my AR skills."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-pokemon-dark">
        <div class="container text-center">
            <h2 class="section-title mb-4">Ready to Level Up Your Game?</h2>
            <p class="text-white-50 lead mb-5">Join thousands of trainers who are already enhancing their Pokémon GO experience with our tools and community.</p>
            <a href="{{ url('/tl50data') }}" class="btn btn-pokemon btn-lg">
                Start Your Journey Today <i class="fa-solid fa-chevron-right ms-2"></i>
            </a>
        </div>
    </section>

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
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    </script>
</body>
</html>