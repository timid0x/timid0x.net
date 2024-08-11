<!--
### TIMID0x - 2023-10-25T15:40:42.000-05:00
-->
@extends('layouts.template-post')

@section('title', $post->title)

@section('scripts-header')
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@timid0x" />
    <meta name="twitter:title" content="{{ $post->title }}" />
    <meta name="twitter:description" content="{!! Str::words(strip_tags($post->body), 25) !!}" />
    <meta name="twitter:image" content="{{ $post->featured_image }}" />

    <meta property="og:site_name" content="timid0x" />
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{!! Str::words(strip_tags($post->body), 25) !!}">
    <meta property="og:image" itemprop="image" content="{{ $post->featured_image }}">
    <link itemprop="thumbnailUrl" href="{{ $post->featured_image }}">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:updated_time" content="updatedtime">
    <meta property="og:locale" content="es" />

    <meta name="title" content="{{ $post->title }}" />
    <meta name="description" content="{!! Str::words(strip_tags($post->body), 15) !!}" />
    <meta name="keywords" content="{{ $post->title }}">
    <meta name="language" content="Spanish">
    <meta name="revisit-after" content="1 days">

@endsection

@section('contenido')


    <!-- Page content-->
    <div class="container mt-5">
        <div class="row text-white">
            <div class="col-lg-9">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <div class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
                        <!-- Post meta content-->
                        <div class="text-secondary fst-italic mb-2">Creado
                            {{ Str::lower(\Carbon\Carbon::parse($post->created_at)->format('M d, Y')) }}</div>
                        <!-- Post categories-->
                        {{-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a> --}} {{-- tag --}}

                    </div>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded" src="{{ $post->featured_image }}"
                            alt="..." />
                    </figure>
                    <!-- Post content-->
                    <section class="mb-5">
                        {!! $post->body !!}
                        <div class="text-secondary fst-italic mb-2"><small>Editado:
                                {{ Str::lower(\Carbon\Carbon::parse($post->updated_at)->format('d M Y')) }} por
                                {{ $post->user->name }}
                            </small></div>
                        <br>
                        <a class="btn btn-secondary btn-sm mb-3" href="/blog"><i class="fa-solid fa-backward"></i>
                            Regresar</a>
                        <br>

                        <!-- ShareThis BEGIN -->
                        <div class="shareaholic-canvas" data-app="share_buttons" data-app-id="33132794"></div>
                        <!-- ShareThis END -->
                    </section>

                    <br>
                </article>

            </div>

            <!-- Side widgets-->
            <div class="col-lg-3">
                <!-- Search widget-->

                <div class="card text-white bg-secondary mb-4">
                    <div class="card-header">Buscar</div>
                    <div class="card-body">
                        <div class="input-group-prepend">

                            <form class="d-flex" action="{{ route('post.search') }}" method="GET">
                                @csrf
                                <input class="form-control me-1" name="search" type="search" placeholder="Buscar"
                                    aria-label="Search">
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
