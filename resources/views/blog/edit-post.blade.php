<!--
### TIMID0x - 2023-08-02T15:22:11.000-05:00
-->
@extends('layouts.template-post-admin')

@section('title', 'Create')

@section('scripts-header')
    {{-- TinyMCE Script --}}
    <script src="https://cdn.tiny.cloud/1/63m0xs5y0ko4b8fwlr9wbzgi0j4i2ykpplcyakmmky4nyo5s/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
@endsection

@section('contenido')

    <main>

        <section>
            <div class="container">
                <div class="row justify-content-sm-center">
                    <div class="col">

                        <div class="card shadow-lg mt-2">
                            <div class="card-body p-5">
                                <h1 class="fs-4 card-title fw-bold mb-4">Edit Post</h1>


                                <form action="/edit-post/{{ $post->id }}" method="POST" class="needs-validation"
                                    novalidate="" autocomplete="off">
                                    @csrf
                                    @method('PUT')


                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="Title">Title</label>
                                        <input id="title" type="text"
                                            class="form-control @error('title') is-invalid @enderror" name="title"
                                            value="{{$post->title}}" placeholder="Title ..." autofocus>
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <br>
                                        <label class="mb-2 text-muted" for="featured_image">Featured image</label>
                                        <input id="featured_image" type="text"
                                            class="form-control @error('featured_image') is-invalid @enderror"
                                            name="featured_image" value="{{$post->featured_image}} "
                                            
                                            placeholder="featured_image ..." autofocus>
                                        @error('featured_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <br>
                                        <label class="mb-2 text-muted" for="body">Body</label>
                                        <textarea class="form-control @error('body') is-invalid @enderror" name="body" required autofocus
                                            placeholder="Body ..."> {{$post->body}}                                    
                                        
                                        
                                        </textarea>
                                        @error('body')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <br>
                                        <div class="form-check m-2">
                                            <input class="form-check-input @error('visibility') is-invalid @enderror" type="checkbox" name="visibility"
                                                id="visibility" @if (old('visibility')) checked @endif value="1">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{ __('Visibility') }}
                                            </label>
                                            @error('visibility')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                    </div>
                                    <div class="d-flex align-items-center">
                                        <button type="submit" class="btn btn-primary ms-auto">
                                            Save Post
                                        </button>
                                    </div>
                                </form>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection


@section('scripts-footer')

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'code codesample emoticons tinydrive anchor autolink charmap codesample emoticons image link lists media table visualblocks',
            toolbar: 'code codesample emoticons undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            image_advtab: true,
            image_dimensions: false,
            link_default_target: '_blank',
            image_class_list: [{
                    title: 'None',
                    value: ''
                },
                {
                    title: 'fluid',
                    value: 'img-fluid img-thumbnail'
                }


            ],
            link_class_list: [{
                    title: 'None',
                    value: ''
                },
                {
                    title: 'Tag',
                    value: 'tag'
                }

            ]

        });
    </script>

@endsection


@section('footer-fixed', 'fixed')
