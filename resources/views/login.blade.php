<!--
### TIMID0x - 2023-06-23T09:56:25.000-05:00
-->
@extends('layouts.template-form')

@section('title', 'TL50Data')

@section('script-header')

    <style>
        /*Fondo Gradient*/
        .gradient-custom-2 {
            background-image: linear-gradient(to top, #c4c5c7 0%, #dcdddf 52%, #ebebeb 100%);
        }

        .modal-dialog {
            max-width: 800px;
            margin: 30px auto;
        }



        .modal-body {
            position: relative;
            padding: 0px;
        }

        .close {
            position: absolute;
            right: -30px;
            top: 0;
            z-index: 999;
            font-size: 2rem;
            font-weight: normal;
            color: #fff;
            opacity: 1;
        }
    </style>


    <script>
        var player
        var staticPlayer

        function onYouTubeIframeAPIReady() {
            console.log('onYouTubeIframeAPIReady')
            player = new YT.Player('player', {
                videoId: 'M7lc1UVf-VE',
                playerVars: {
                    'playsinline': 1
                },
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            })
        }

        function onPlayerReady(event) {
            event.target.playVideo() // autostart
        }

        var done = false;

        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.PLAYING && !done) {
                // do other custom stuff here
                //setTimeout(stopVideo, 6000);
                //done = true;
            }
        }

        function stopVideo() {
            player.stopVideo()
        }

        function loadYouTubeVideo() {
            // 2. This code loads the IFrame Player API code asynchronously.
            var tag = document.createElement('script');
            tag.src = "https://www.youtube.com/iframe_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        }

        var dynamicVideoModal = document.getElementById('dynamicVideoModal')
        dynamicVideoModal.addEventListener('show.bs.modal', function(event) {
            // dynamically create video inside modal
            // loadYouTubeVideo()
        })
        dynamicVideoModal.addEventListener('hidden.bs.modal', event => {
            player.stopVideo()
        })


        // manual controls outside YT
        const playBtn = document.getElementById('playBtn')
        playBtn.addEventListener('click', function(event) {
            player.playVideo()
        })

        const pauseBtn = document.getElementById('pauseBtn')
        pauseBtn.addEventListener('click', function(event) {
            console.log('pause')
            player.pauseVideo()
        })

        const myModalEl = document.getElementById('videoModal')
        myModalEl.addEventListener('show.bs.modal', event => {
            staticPlayer = new YT.Player('staticPlayer')
        })
        myModalEl.addEventListener('hidden.bs.modal', event => {
            staticPlayer.stopVideo()
        })
    </script>


@endsection



@section('contenido')

    <main>

        <section>
            <div class="container">
                <div class="row justify-content-sm-center">
                    <div class="text-center my-3">
                        <a href="/"><img
                                src="{{ asset('assets/images/logo_n36bgc.png') }}"
                                alt="TIMID0x" width="75" height="75"></a>
                    </div>



                    <div class="container py-3">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-xl-10">
                                <div class="card shadow-lg rounded-3 text-black">
                                    <div class="row g-0">
                                        <div class="col-lg-6">
                                            <div class="card-body p-md-5 mx-md-4">

                                                <h3 class="fs-4 card-title fw-bold mb-3">Welcome back</h3>
                                                <form action="/tl50data" method="POST" class="needs-validation" novalidate=""
                                                    autocomplete="off">
                                                    @csrf
                                                    @if (session()->has('alert-success'))
                                                        <div class="alert alert-success alert-dismissible fade show"
                                                            role="alert">
                                                            <strong>{{ session()->get('alert-success') }} </strong>
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                                aria-label="Close"></button>
                                                        </div>
                                                    @elseif (Session::has('alert-failed'))
                                                        <div class="alert alert-danger alert-dismissible fade show">
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                                aria-label="Close"></button>
                                                            {{ Session::get('alert-failed') }}
                                                        </div>
                                                        <script type="text/javascript">
                                                            $(".alert").delay(5000).fadeTo(500, 0).slideUp(500, function() {
                                                                $(this).alert('close');
                                                            });
                                                        </script>
                                                    @endif

                                                    <div class="p-2 mb-2">
                                                        <label class="mb-2 text-muted" for="name">Username</label>
                                                        <input id="name" type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            name="name" value="" required autofocus>
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>




                                                    <div class="p-2 mb-2">
                                                        <!-- password box-->
                                                        <div class="mb-2 w-100">
                                                            <label class="text-muted" for="password">Password</label>
                                                            <a href="{{ route('forgot-password') }}" class="float-end">
                                                                Forgot Password?
                                                            </a>
                                                        </div>
                                                        <input id="password" type="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            name="password" required>

                                                        @if ($errors->has('password'))
                                                            <div class="alert alert-danger alert-dismissible fade show mt-2"
                                                                role="alert">
                                                                <strong>{{ $errors->first('password') }} </strong>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>

                                                            <script type="text/javascript">
                                                                $(".alert").delay(5000).fadeTo(500, 0).slideUp(500, function() {
                                                                    $(this).alert('close');
                                                                });
                                                            </script>
                                                        @endif
                                                    </div>

                                                    <div class="d-flex align-items-center">
                                                        <button type="submit" class="btn btn-primary ms-auto">
                                                            Login
                                                        </button>
                                                    </div>
                                                </form>

                                                <!-- go to register page-->
                                                <div class="py-3 border-0">
                                                    <div class="text-center">
                                                        Don't have an account? <a href="{{ route('user.getregister') }}"
                                                            class="text-dark">Create One</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                            <div class="text-black px-3 py-4 p-md-5 mx-md-4">
                                                <h4 class="fw-bold mb-2">TL50Data</h4>
                                                <p class="p-2 mb-2">Save your record by month. I know math and
                                                    statistics
                                                    are lazy, but you can't live without them. Alternative to
                                                    <strong class="text-dark">#tl40data</strong> that
                                                    is no longer with us.
                                                </p>
                                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#videoModal"> Demo</button>



                                                <!-- Modal HTML -->
                                                <div class="modal fade" id="videoModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Demo</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body p-0">
                                                                <div class="ratio ratio-16x9">
                                                                    <iframe id="staticPlayer"
                                                                        src="https://www.youtube.com/embed/sKN-UlueJnc"
                                                                        title="YouTube video player" frameborder="0"
                                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                                        allowfullscreen></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- END Modal HTML -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
    </main>
@endsection

@section('footer-fixed', '')
