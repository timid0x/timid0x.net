<!--
### TIMID0x - 2023-08-23T09:35:45.000-05:00
-->
@extends('layouts.template-post')

@section('title', 'Blog ...')

@section('scripts-header')
    <meta name="title" content="TIMID0x: PokemonGO, TL50Data and more">
    <meta name="description"
        content="Discover valuable insights and informative articles on our blog. Find what you're looking for with our easy-to-use search feature. Explore now!. Follow on social networks as @timid0x">
    <meta name="keywords" content="timid0x,TL50data,TL40Data,Pokemon,PokemonGO,AR,GOSnapshot,Blog">
@endsection

@section('contenido')

    <!-- Page header with logo and tagline-->
    <header class="py-3 bg-dark mb-4">
        <div class="container">
            <div class="text-center my-3">
                <h1 class="fw-bolder text-white">Blog ... búsqueda</h1>
            </div>
        </div>


    </header>

    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">


                <!-- Nested row for non-featured blog posts-->
                <div class="row">


                    @if ($posts->isNotEmpty())
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
                                        <a class="btn btn-secondary" href="/blog/{{ $post->slug }}">Ver más →</a>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="pb-4">
                            <h2>Opss ...</h2>
                            <img class="img-fluid" src="{{ asset('assets/images/fz6c.gif') }}" alt="">

                        </div>

                    @endif



                </div>



                <!-- Pagination-->
                {{-- {!! $posts->links() !!} --}}


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
                                    <button class="btn btn-secondary btn-sm" type="submit">
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
