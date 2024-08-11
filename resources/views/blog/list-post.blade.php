<!--
### TIMID0x - 2023-08-23T09:35:50.000-05:00
-->
@extends('layouts.template-post')

@section('title', 'Blog')

@section('scripts-header')
    <meta name="title" content="TIMID0x: PokemonGO, TL50Data and more">
    <meta name="description"
        content="Explore the world of PokemonGO, games, and pvp through our informative blog. Stay updated and enhance your gaming experience. Follow on social networks as @timid0x">
    <meta name="keywords" content="timid0x,TL50data,TL40Data,Pokemon,PokemonGO,AR,GOSnapshot,Blog">
@endsection

@section('contenido')

    <!-- Page header with logo and tagline-->

    <div class="container py-3 bg-dark mb-4">
        <div class="text-center my-3">
            <h1 class="fw-bolder text-white">Blog ...</h1>
        </div>
    </div>



    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">


                <!-- Nested row for non-featured blog posts-->
                <div class="row">

                    @foreach ($posts as $post)
                        <div class="col-sm-6">
                            <div class="card mb-4">
                                <a href="/blog/{{ $post->slug }}"><img class="card-img-top"
                                        src="{{ $post->featured_image }}" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">
                                        {{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }} </div>
                                    <h2 class="card-title">{{ $post->title }}</h2>
                                    <p class="card-text">{!! Str::words(strip_tags($post->body), 25) !!}</p>
                                    <a class="btn btn-secondary btn-sm" href="/blog/{{ $post->slug }}">Ver más →</a>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>



                <!-- Pagination-->
                {!! $posts->links() !!}


            </div>



            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->

                <div class="card text-white bg-secondary mb-4">
                    <div class="card-header">Buscar</div>
                    <div class="card-body">
                        <div class="input-group-prepend">

                            <form class="d-flex" action="{{ route('post.search') }}" method="GET">
                                @csrf
                                <input class="form-control me-1" name="search" type="search" placeholder="Buscar"
                                    aria-label="Buscar">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </form>

                        </div>
                    </div>

                </div>
                <!-- END Search widget-->
            </div>
            <!-- END Side widgets-->



        </div>
    </div>

@endsection

@section('scripts-footer')

@endsection


@section('footer-fixed', '')
