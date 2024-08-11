<!--
### TIMID0x - 2023-11-16T12:05:53.000-05:00
-->
@extends('layouts.template-friendcode')

@section('title', 'Friend Code')

@section('scripts-header')
    <meta name="title" content="TIMID0x: PokemonGO friend codes and more">
    <meta name="description"
        content="Connect with fellow Pokemon enthusiasts and share your Friend codes on our network. Join the fun and level up your game!">
    <meta name="keywords" content="timid0x,TL50data,PokemonGO,AR,GOSnapshot,Blog,FriendCodes">
@endsection

@section('contenido')

    <!-- Page header with logo and tagline-->

    <div class="container py-3 bg-dark  mb-4">
        <div class="text-center my-3">
            <h1 class="fw-bolder text-white">Friend codes ...</h1>
        </div>
    </div>



    <!-- Page content-->
    <div class="container">

        <div class="row justify-content-center">

            @if (Session::has('success'))
                <div id="alert" class="alert alert-success alert-dismissible fade show text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ Session::get('success') }}
                </div>
                <script type="text/javascript">
                    setTimeout(function() {

                        // Closing the alert
                        $('#alert').alert('close');
                    }, 5000);
                </script>
            @endif

            <div class="col col-md-6">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <!-- box register-->
                        <h1 class="fs-4 card-title fw-bold mb-4">ADD your PokemonGO code</h1>
                        <form action="/friendcode" method="POST" class="needs-validation" novalidate=""
                            autocomplete="off">
                            @csrf


                            <!-- box code-->
                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="code">Code</span>
                                <input id="code" name="code" type="text"
                                    class="form-control @error('code') is-invalid @enderror" aria-label="Code 12 digits"
                                    aria-describedby="Code 12 digits" placeholder="Code 12 digits" autofocus>
                            </div>
                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <!-- box team-->
                            <div class="input-group input-group-sm mb-3">
                                <label class="input-group-text" for="team_id">Team</label>
                                <select name="team_id" class="form-select" id="team_id">
                                    <option value="0">N/A</option>
                                    <option value="1">Yellow - Instinct 🟡</option>
                                    <option value="2">Blue - Mystic 🔵</option>
                                    <option value="3">Red - Valor 🔴</option>
                                </select>
                            </div>

                            <!-- box country-->
                            <div class="input-group input-group-sm mb-3">
                                <label class="input-group-text" for="country_id">Country</label>
                                <select name="country_id" class="form-select" id="country_id">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- box gift-->
                            <div class="input-group input-group-sm mb-3">
                                <label class="input-group-text" for="trainer_type">Trainer gift</label>
                                <select name="trainer_type" class="form-select" id="trainer_type">
                                    <option value="0">C - Casual 🆓</option>
                                    <option value="1">S - Gift Send 📤</option>
                                    <option value="2">O - Gift Open 📥</option>
                                    <option value="3">A - All 🔁</option>
                                </select>
                            </div>

                            <p class="form-text text-muted mb-3">
                                By adding you agree with our terms and condition.
                            </p>

                            <div class="align-items-center d-flex">
                                <button type="submit" class="btn btn-primary ms-auto">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-2 border-0">
                        <div class="text-center">
                            <small>If you have already entered your PokemonGO code, you can update it after 24 hours to
                                appear at the top of the list #LIFO #PokemonGOFriendCode. Any problem send us an email and
                                we will attend as
                                soon as possible <a href="mailto:timid0x.player@gmail.com?subject=FriendCodes"
                                    class="text-dark"><i class="fa-solid fa-envelope"></i></a></small>

                        </div>
                    </div>
                </div>

                {{-- filter --}}

                <form method="GET" action="{{ route('show.friendcodes') }}" id="filter">
                    @csrf
                    <div class="m-2 accordion" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    Filter
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">

                                    <!-- box team-->
                                    <div class="input-group input-group-sm mb-3">
                                        <label class="input-group-text" for="team_id2">Team</label>
                                        <select name="team_id2" class="form-select" id="team_id2">
                                            <option value="" disabled
                                                {{ old('team_id2', null) === null || old('team_id2') === '' ? 'selected' : '' }}>
                                                -- Select an option --</option>
                                            <option value="00"
                                                {{ old('team_id2', session('selected_team_id2')) == '0' ? 'selected' : '' }}>
                                                N/A</option>
                                            <option value="1"
                                                {{ old('team_id2', session('selected_team_id2')) == '1' ? 'selected' : '' }}>
                                                Yellow - Instinct 🟡</option>
                                            <option value="2"
                                                {{ old('team_id2', session('selected_team_id2')) == '2' ? 'selected' : '' }}>
                                                Blue - Mystic 🔵</option>
                                            <option value="3"
                                                {{ old('team_id2', session('selected_team_id2')) == '3' ? 'selected' : '' }}>
                                                Red - Valor 🔴</option>
                                        </select>
                                    </div>

                                    <!-- box country-->
                                    <div class="input-group input-group-sm mb-3">
                                        <label class="input-group-text" for="country_id2">Country</label>
                                        <select name="country_id2" class="form-select" id="country_id2">
                                            <option value="" disabled
                                                {{ old('country_id2', null) === null || old('country_id2') === '' ? 'selected' : '' }}>
                                                -- Select an option -- </option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->name }}"
                                                    {{ old('country_id2', session('selected_country_id2')) == $country->name ? 'selected' : '' }}>
                                                    {{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button type="button" name="reset" class="btn btn-danger reset">Reset</button>
                                        <button type="button" name="search" class="btn btn-success">Search</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </form>


            </div>
        </div>

        <br>

        <div class="row hidden-md-up">
            @if ($codes)


                @foreach ($codes as $fcode)
                    <div class="col-md-4 d-flex justify-content-center">
                        <div class="card align-items-center w-75 m-2"
                            style="
                                 @switch($fcode->team_id)
                                        @case(1)
                                        
                                        background-color: #fff166;
                                        
                                        @break

                                        @case(2)
                                        background-color: #73C2FB;
                                        @break

                                        @case(3)
                                        background-color: #f34662;
                                        @break

                                        @default
                                        background-color: rgb(255, 255, 255);
                                    @endswitch
                        
                        
                        ">
                            <div class="card-block">
                                <div class="card-header bg-transparent text-center">
                                    {!! QrCode::gradient(0, 0, 0, 25, 25, 25, 'diagonal')->size(150)->generate($fcode->code) !!}

                                </div>

                                <div class="card-body">
                                    <p class="card-text">

                                        @if ($fcode)
                                            <span class="fi fi-{{ Str::lower($fcode->country_code->code) }}"></span>
                                        @else
                                            <span class="fi fi-un"></span>
                                        @endif

                                        @switch($fcode->trainer_type)
                                            @case('1')
                                                Gift Send
                                            @break

                                            @case('2')
                                                Gift Open
                                            @break

                                            @case('3')
                                                All
                                            @break

                                            @default
                                                Casual
                                        @endswitch



                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-dark btn-sm" type="button"
                                                onclick="copyToClipboard('copy_{{ $fcode->id }}')"><i
                                                    class="fa-solid fa-copy"></i></button>
                                        </div>
                                        <input id="copy_{{ $fcode->id }}" value="{{ $fcode->code }}" type="text"
                                            class="form-control" placeholder="" aria-label="" aria-describedby="code"
                                            readonly>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



            @endif

        </div>




        {{-- Pagination --}}


        @if (!isset($code))
            <div class="d-flex justify-content-center">
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $codes->links() }}
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                No codes!
            </div>
        @endif


        <br>


    </div>

@endsection

@section('scripts-footer')

    <script>
        function copyToClipboard(id) {


            // Get the text field
            var copyText = document.getElementById(id);

            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);

            // Alert the copied text
            //alert("Copied the text: " + copyText.value);
        }
    </script>

    <script>
        let form = document.querySelector('#filter');

        document.querySelector('button[name="search"]').addEventListener('click', function(e) {
            form.submit();
        });

        // Get all the reset buttons from the dom
        var resetButtons = document.getElementsByClassName('reset');

        // Loop through each reset buttons to bind the click event
        for (var i = 0; i < resetButtons.length; i++) {
            resetButtons[i].addEventListener('click', resetForm);
        }

        /**
         * Function to hard reset the inputs of a form.
         *
         * @param object event The event object.
         * @return void
         */
        function resetForm(event) {

            event.preventDefault();

            var form = event.currentTarget.form;
            var inputs = form.querySelectorAll("select,input");

            inputs.forEach(function(input, index) {
                input.value = "";
            });

        }
    </script>

@endsection


@section('footer-fixed', '')
