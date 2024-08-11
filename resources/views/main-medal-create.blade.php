<!--
### TIMID0x - 20240803
-->
@extends('layouts.template-core')

@section('title', 'Create Medal')

@section('medal-link', 'active')

@section('contenido')
    <main>


        <div class="container m-1">
            <div class="mt-3 pull-left">
                <h2>{{ __('Create Medal') }}</h2>
            </div>
            <div class="mt-4">
                <form action="{{ route('medal.postcreate') }}" method="POST">
                    @csrf

                    <div class="row row-cols-2 row-cols-md-4 row-cols-xl-6 g-3">

                        {{-- total_xp --}}
                        <div class="col d-flex align-items-stretch">
                            <div class="card text-white bg-secondary border-dark" style="max-width: 12rem;">
                                <div class="card-header">
                                    <img class="img-fluid" src="{{ asset('assets/images/Scanner_Platinum.png') }}"
                                        alt="Total XP" width="50" height="50">
                                    <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Total XP') }}</span></div>

                                </div>
                                <div class="card-body border-0">
                                    <p class="card-text">{{ __('Total XP') }}</p>
                                </div>
                                <ul class="list-group list-group-flush border-0">
                                    <li class="list-group-item bg-secondary">
                                        <input class="form-control form-control-sm @error('total_xp') is-invalid @enderror"
                                            name="total_xp" type="numeric" placeholder="0 000 000"
                                            value="{{ old('total_xp') }}" autofocus>
                                        @error('total_xp')
                                            <span class="bg-danger text-white invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </li>
                                </ul>
                                <div class="card-footer text-white">
                                    @if ($medals === null)
                                        <small>{{ __('before') }}: 0</small>
                                    @else
                                        <small>{{ __('before') }}: {{ $medals->total_xp }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Actual Stardust --}}
                        <div class="col d-flex align-items-stretch">
                            <div class="card text-white bg-secondary border-dark" style="max-width: 12rem;">
                                <div class="card-header">
                                    <img class="img-fluid" src="{{ asset('assets/images/Battle_Platinum.png') }}"
                                        alt="Actual Stardust" width="50" height="50">
                                    <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Actual Stardust') }}</span>
                                    </div>
                                </div>
                                <div class="card-body border-0">
                                    <p class="card-text">{{ __('Current Stardust') }}</p>
                                </div>
                                <ul class="list-group list-group-flush border-0">
                                    <li class="list-group-item bg-secondary">
                                        <input
                                            class="form-control form-control-sm @error('actual_stardust') is-invalid @enderror"
                                            name="actual_stardust" type="numeric" placeholder="0 000 000"
                                            value="{{ old('actual_stardust') }}">
                                        @error('actual_stardust')
                                            <span class="bg-danger text-white invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </li>
                                </ul>
                                <div class="card-footer text-white">
                                    @if ($medals === null)
                                        <small>{{ __('before') }}: 0</small>
                                    @else
                                        <small>{{ __('before') }}: {{ $medals->actual_stardust }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>


                        {{-- Elite Collector --}}
                        <div class="col d-flex align-items-stretch">
                            <div class="card text-white bg-secondary border-dark" style="max-width: 12rem;">
                                <div class="card-header">
                                    <img class="img-fluid" src="{{ asset('assets/images/Elite_Collector_medal.png') }}"
                                        alt="Elite Collector" width="50" height="50">
                                    <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Elite Collector') }}</span>
                                    </div>
                                </div>
                                <div class="card-body border-0">
                                    <p class="card-text">{{ __('Current Elite Collector') }}</p>
                                </div>
                                <ul class="list-group list-group-flush border-0">
                                    <li class="list-group-item bg-secondary">
                                        <input
                                            class="form-control form-control-sm @error('elite_collector') is-invalid @enderror"
                                            name="elite_collector" type="numeric" placeholder="0 000 000"
                                            value="{{ old('elite_collector') }}">
                                        @error('elite_collector')
                                            <span class="bg-danger text-white invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </li>
                                </ul>
                                <div class="card-footer text-white">
                                    @if ($medals === null)
                                        <small>{{ __('before') }}: 0</small>
                                    @else
                                        <small>{{ __('before') }}: {{ $medals->elite_collector }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>



                        {{-- jogger --}}
                        <div class="col d-flex align-items-stretch">
                            <div class="card" style="max-width: 12rem;">

                                @if ($medals === null)
                                    <div class="card-header bronze-medal">
                                    @elseif ($medals->jogger < 100)
                                        <div class="card-header bronze-medal">
                                        @elseif ($medals->jogger >= 100 && $medals->jogger < 1000)
                                            <div class="card-header silver-medal">
                                            @elseif ($medals->jogger >= 1000 && $medals->jogger < 10000)
                                                <div class="card-header gold-medal">
                                                @else
                                                    <div class="card-header platinum-medal">
                                @endif


                                <img class="img-fluid" src="{{ asset('assets/images/Jogger_Platinum.png') }}"
                                    alt="Jogger" width="50" height="50">
                                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Jogger') }}</strong></span>
                                </div>
                            </div>
                            <div class="card-body border-0">
                                <p class="card-text">{{ __('Kilometers walked') }}</p>
                            </div>
                            <ul class="list-group list-group-flush border-0">
                                <li class="list-group-item">
                                    <input class="form-control form-control-sm @error('jogger') is-invalid @enderror"
                                        name="jogger" type="numeric" placeholder="0 000 000" value="{{ old('jogger') }}">
                                    @error('jogger')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </li>
                            </ul>
                            <div class="card-footer text-muted border-0">
                                @if ($medals === null)
                                    <small>{{ __('before') }}: 0</small>
                                @else
                                    <small>{{ __('before') }}: {{ $medals->jogger }}</small>
                                @endif
                            </div>
                        </div>
                    </div>


                    {{-- kanto --}}
                    <div class="col d-flex align-items-stretch">
                        <div class="card" style="max-width: 12rem;">
                            @if ($medals === null)
                                <div class="card-header bronze-medal">
                                @elseif ($medals->kanto < 50)
                                    <div class="card-header bronze-medal">
                                    @elseif ($medals->kanto >= 50 && $medals->kanto < 100)
                                        <div class="card-header silver-medal">
                                        @elseif ($medals->kanto >= 100 && $medals->kanto < 151)
                                            <div class="card-header gold-medal">
                                            @else
                                                <div class="card-header platinum-medal">
                            @endif
                            <img class="img-fluid" src="{{ asset('assets/images/Kanto_Platinum.png') }}" alt="Kanto"
                                width="50" height="50">
                            <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Kanto') }}</span></div>
                        </div>
                        <div class="card-body border-0">
                            <p class="card-text">{{ __('Kanto Pokédex entries registered') }}</p>
                        </div>
                        <ul class="list-group list-group-flush border-0">
                            <li class="list-group-item">
                                <input class="form-control form-control-sm @error('kanto') is-invalid @enderror"
                                    name="kanto" type="numeric" placeholder="0 000 000" value="{{ old('kanto') }}">
                                @error('kanto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </li>
                        </ul>
                        <div class="card-footer text-muted border-0">
                            @if ($medals === null)
                                <small>{{ __('before') }}: 0</small>
                            @else
                                <small>{{ __('before') }}: {{ $medals->kanto }}</small>
                            @endif
                        </div>
                    </div>
            </div>

            {{-- Collector --}}
            <div class="col d-flex align-items-stretch">
                <div class="card" style="max-width: 12rem;">
                    @if ($medals === null)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->collector < 500)
                            <div class="card-header bronze-medal">
                            @elseif ($medals->collector >= 500 && $medals->collector < 2000)
                                <div class="card-header silver-medal">
                                @elseif ($medals->collector >= 2000 && $medals->collector < 50000)
                                    <div class="card-header gold-medal">
                                    @else
                                        <div class="card-header platinum-medal">
                    @endif


                    <img class="img-fluid" src="{{ asset('assets/images/Collector_Platinum.png') }}" alt="Collector"
                        width="50" height="50">
                    <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Collector') }}</span></div>
                </div>
                <div class="card-body border-0">
                    <p class="card-text">{{ __('Pokémon caught') }}</p>
                </div>
                <ul class="list-group list-group-flush border-0">
                    <li class="list-group-item">
                        <input class="form-control form-control-sm @error('collector') is-invalid @enderror"
                            name="collector" type="numeric" placeholder="0 000 000" value="{{ old('collector') }}">
                        @error('collector')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </li>
                </ul>
                <div class="card-footer text-muted border-0">
                    @if ($medals === null)
                        <small>{{ __('before') }}: 0</small>
                    @else
                        <small>{{ __('before') }}: {{ $medals->collector }}</small>
                    @endif
                </div>
            </div>
        </div>

        {{-- Scientist --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->scientist < 20)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->scientist >= 20 && $medals->scientist < 200)
                            <div class="card-header silver-medal">
                            @elseif ($medals->scientist >= 200 && $medals->scientist < 2000)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif

                <img class="img-fluid" src="{{ asset('assets/images/Scientist_Platinum.png') }}" alt="Scientist"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Scientist') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Pokémon evolved') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('scientist') is-invalid @enderror" name="scientist"
                        type="numeric" placeholder="0 000 000" value="{{ old('scientist') }}">
                    @error('scientist')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->scientist }}</small>
                @endif
            </div>
        </div>
        </div>


        {{-- Breeder --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->breeder < 100)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->breeder >= 100 && $medals->breeder < 500)
                            <div class="card-header silver-medal">
                            @elseif ($medals->breeder >= 500 && $medals->breeder < 2500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Breeder_Platinum.png') }}" alt="Breeder"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Breeder') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Pokémon Eggs hatched') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('breeder') is-invalid @enderror" name="breeder"
                        type="numeric" placeholder="0 000 000" value="{{ old('breeder') }}">
                    @error('breeder')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->breeder }}</small>
                @endif
            </div>
        </div>
        </div>


        {{-- Backpacker --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->backpacker < 1000)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->backpacker >= 1000 && $medals->backpacker < 2000)
                            <div class="card-header silver-medal">
                            @elseif ($medals->backpacker >= 2000 && $medals->backpacker < 50000)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Backpacker_Platinum.png') }}" alt="Backpacker"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Backpacker') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('PokéStops visited') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('backpacker') is-invalid @enderror"
                        name="backpacker" type="numeric" placeholder="0 000 000" value="{{ old('backpacker') }}">
                    @error('backpacker')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->backpacker }}</small>
                @endif
            </div>
        </div>
        </div>



        {{-- Sightseer --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->sightseer < 100)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->sightseer >= 100 && $medals->sightseer < 1000)
                            <div class="card-header silver-medal">
                            @elseif ($medals->sightseer >= 1000 && $medals->sightseer < 2000)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Sightseer_Platinum.png') }}" alt="Sightseer"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Sightseer') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Unique PokéStops visited') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('sightseer') is-invalid @enderror" name="sightseer"
                        type="numeric" placeholder="0 000 000" value="{{ old('sightseer') }}">
                    @error('sightseer')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->sightseer }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Fisher --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->fisher < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->fisher >= 50 && $medals->fisher < 300)
                            <div class="card-header silver-medal">
                            @elseif ($medals->fisher >= 300 && $medals->fisher < 1000)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Fisherman_Platinum.png') }}" alt="Fisher"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Fisher') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Big Magikarp caught. *13.13 kg or havier') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('fisher') is-invalid @enderror" name="fisher"
                        type="numeric" placeholder="0 000 000" value="{{ old('fisher') }}">
                    @error('fisher')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->fisher }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Battle Girl --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->battle_girl < 100)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->battle_girl >= 100 && $medals->battle_girl < 1000)
                            <div class="card-header silver-medal">
                            @elseif ($medals->battle_girl >= 1000 && $medals->battle_girl < 4000)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/BattleGirl_Platinum.png') }}" alt="Battle Girl"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Battle Girl') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Gym Battles won') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('battle_girl') is-invalid @enderror"
                        name="battle_girl" type="numeric" placeholder="0 000 000" value="{{ old('battle_girl') }}">
                    @error('battle_girl')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->battle_girl }}</small>
                @endif
            </div>
        </div>
        </div>


        {{-- Ace Trainer --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->ace_trainer < 100)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->ace_trainer >= 100 && $medals->ace_trainer < 1000)
                            <div class="card-header silver-medal">
                            @elseif ($medals->ace_trainer >= 1000 && $medals->ace_trainer < 2000)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/AceTrainer_Platinum.png') }}" alt="Ace Trainer"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Ace Trainer') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Team Leader Battles won') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('ace_trainer') is-invalid @enderror"
                        name="ace_trainer" type="numeric" placeholder="0 000 000" value="{{ old('ace_trainer') }}">
                    @error('ace_trainer')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->ace_trainer }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Youngster --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->youngster < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->youngster >= 50 && $medals->youngster < 300)
                            <div class="card-header silver-medal">
                            @elseif ($medals->youngster >= 300 && $medals->youngster < 1000)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Youngster_Platinum.png') }}" alt="Youngster"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Youngster') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Tiny Rattata caught *2.41 kg or lighter') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('youngster') is-invalid @enderror" name="youngster"
                        type="numeric" placeholder="0 000 000" value="{{ old('youngster') }}">
                    @error('youngster')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->youngster }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Pikachu Fan --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->pikachu_fan < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->pikachu_fan >= 50 && $medals->pikachu_fan < 300)
                            <div class="card-header silver-medal">
                            @elseif ($medals->pikachu_fan >= 300 && $medals->pikachu_fan < 1000)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/PikachuFan_Platinum.png') }}" alt="Pikachu Fan"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Pikachu Fan') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Pikachu caught') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('pikachu_fan') is-invalid @enderror"
                        name="pikachu_fan" type="numeric" placeholder="0 000 000" value="{{ old('pikachu_fan') }}">
                    @error('pikachu_fan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->pikachu_fan }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Unown --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->unown < 10)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->unown >= 10 && $medals->unown < 26)
                            <div class="card-header silver-medal">
                            @elseif ($medals->unown >= 26 && $medals->unown < 28)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Unown_Platinum.png') }}" alt="Unown"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Unown') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Unique Unown caught') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('unown') is-invalid @enderror" name="unown"
                        type="numeric" placeholder="0 000 000" value="{{ old('unown') }}">
                    @error('unown')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->unown }}</small>
                @endif
            </div>
        </div>
        </div>


        {{-- Johto --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->johto < 30)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->johto >= 30 && $medals->johto < 70)
                            <div class="card-header silver-medal">
                            @elseif ($medals->johto >= 70 && $medals->johto < 100)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Johto_Platinum.png') }}" alt="Johto"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Johto') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Johto Pokédex entries registered') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('johto') is-invalid @enderror" name="johto"
                        type="numeric" placeholder="0 000 000" value="{{ old('johto') }}">
                    @error('johto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->johto }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Champion --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->champion < 100)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->champion >= 100 && $medals->champion < 1000)
                            <div class="card-header silver-medal">
                            @elseif ($medals->champion >= 1000 && $medals->champion < 2000)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Champion_Platinum.png') }}" alt="Champion"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Champion') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Non-legendary Raid Battles won') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('champion') is-invalid @enderror" name="champion"
                        type="numeric" placeholder="0 000 000" value="{{ old('champion') }}">
                    @error('champion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->champion }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Battle Legend --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->battle_legend < 100)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->battle_legend >= 100 && $medals->battle_legend < 1000)
                            <div class="card-header silver-medal">
                            @elseif ($medals->battle_legend >= 1000 && $medals->battle_legend < 2000)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/BattleLegend_Platinum.png') }}" alt="Battle Legend"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Battle Legend') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Legendary Raid Battles won *Ultra Beast counts') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('battle_legend') is-invalid @enderror"
                        name="battle_legend" type="numeric" placeholder="0 000 000"
                        value="{{ old('battle_legend') }}">
                    @error('battle_legend')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->battle_legend }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Berry Master --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->berry_master < 100)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->berry_master >= 100 && $medals->berry_master < 1000)
                            <div class="card-header silver-medal">
                            @elseif ($medals->berry_master >= 1000 && $medals->berry_master < 15000)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/BerryMaster_Platinum.png') }}" alt="Berry Master"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Berry Master') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Berries fed at Gyms') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('berry_master') is-invalid @enderror"
                        name="berry_master" type="numeric" placeholder="0 000 000" value="{{ old('berry_master') }}">
                    @error('berry_master')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->berry_master }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Gym Leader --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->gym_leader < 100)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->gym_leader >= 100 && $medals->gym_leader < 1000)
                            <div class="card-header silver-medal">
                            @elseif ($medals->gym_leader >= 1000 && $medals->gym_leader < 15000)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/GymLeader_Platinum.png') }}" alt="Gym Leader"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Gym Leader') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Hours of defending Gyms') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('gym_leader') is-invalid @enderror"
                        name="gym_leader" type="numeric" placeholder="0 000 000" value="{{ old('gym_leader') }}">
                    @error('gym_leader')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->gym_leader }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Hoenn --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->hoenn < 40)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->hoenn >= 40 && $medals->hoenn < 90)
                            <div class="card-header silver-medal">
                            @elseif ($medals->hoenn >= 90 && $medals->hoenn < 135)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Hoenn_Platinum.png') }}" alt="Hoenn"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Hoenn') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Hoenn Pokédex entries registered') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('hoenn') is-invalid @enderror" name="hoenn"
                        type="numeric" placeholder="0 000 000" value="{{ old('hoenn') }}">
                    @error('hoenn')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->hoenn }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Pokemon Ranger --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->pokemon_ranger < 100)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->pokemon_ranger >= 100 && $medals->pokemon_ranger < 1000)
                            <div class="card-header silver-medal">
                            @elseif ($medals->pokemon_ranger >= 1000 && $medals->pokemon_ranger < 2500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Researcher_Platinum.png') }}" alt="Pokemon Ranger"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Pokemon Ranger') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Field Research tasks completed') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('pokemon_ranger') is-invalid @enderror"
                        name="pokemon_ranger" type="numeric" placeholder="0 000 000"
                        value="{{ old('pokemon_ranger') }}">
                    @error('pokemon_ranger')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->pokemon_ranger }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Idol --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->idol < 2)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->idol >= 2 && $medals->idol < 3)
                            <div class="card-header silver-medal">
                            @elseif ($medals->idol >= 3 && $medals->idol < 20)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Idol_Platinum.png') }}" alt="Idol"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Idol') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Become Best Friends with Trainers') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('idol') is-invalid @enderror" name="idol"
                        type="numeric" placeholder="0 000 000" value="{{ old('idol') }}">
                    @error('idol')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->idol }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Gentleman --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->gentleman < 100)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->gentleman >= 100 && $medals->gentleman < 1000)
                            <div class="card-header silver-medal">
                            @elseif ($medals->gentleman >= 1000 && $medals->gentleman < 2500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Gentleman_Platinum.png') }}" alt="Gentleman"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Gentleman') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Pokémon trades') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('gentleman') is-invalid @enderror" name="gentleman"
                        type="numeric" placeholder="0 000 000" value="{{ old('gentleman') }}">
                    @error('gentleman')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->gentleman }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Pilot --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->pilot < 100000)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->pilot >= 100000 && $medals->pilot < 1000000)
                            <div class="card-header silver-medal">
                            @elseif ($medals->pilot >= 1000000 && $medals->pilot < 10000000)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Pilot_Platinum.png') }}" alt="Pilot"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Pilot') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Earned km across the distance of all Pokémon trades') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('pilot') is-invalid @enderror" name="pilot"
                        type="numeric" placeholder="0 000 000" value="{{ old('pilot') }}">
                    @error('pilot')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->pilot }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Sinnoh --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->sinnoh < 30)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->sinnoh >= 30 && $medals->sinnoh < 80)
                            <div class="card-header silver-medal">
                            @elseif ($medals->sinnoh >= 80 && $medals->sinnoh < 107)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Sinnoh_Platinum.png') }}" alt="Shinnoh"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Sinnoh') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Sinnoh Pokédex entries registered') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('sinnoh') is-invalid @enderror" name="sinnoh"
                        type="numeric" placeholder="0 000 000" value="{{ old('sinnoh') }}">
                    @error('sinnoh')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->sinnoh }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Great League Veteran --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->great_league_veteran < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->great_league_veteran >= 50 && $medals->great_league_veteran < 200)
                            <div class="card-header silver-medal">
                            @elseif ($medals->great_league_veteran >= 200 && $medals->great_league_veteran < 1000)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/GreatLeague_Platinum.png') }}"
                    alt="Great League Veteran" width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Great League Veteran') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Win Trainer Battles in the Great League') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('great_league_veteran') is-invalid @enderror"
                        name="great_league_veteran" type="numeric" placeholder="0 000 000"
                        value="{{ old('great_league_veteran') }}">
                    @error('great_league_veteran')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->great_league_veteran }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Ultra League Veteran --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->ultra_league_veteran < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->ultra_league_veteran >= 50 && $medals->ultra_league_veteran < 200)
                            <div class="card-header silver-medal">
                            @elseif ($medals->ultra_league_veteran >= 200 && $medals->ultra_league_veteran < 1000)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/UltraLeague_Platinum.png') }}"
                    alt="Ultra League Veteran" width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Ultra League Veteran') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Win Trainer Battles in the Ultra League') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('ultra_league_veteran') is-invalid @enderror"
                        name="ultra_league_veteran" type="numeric" placeholder="0 000 000"
                        value="{{ old('ultra_league_veteran') }}">
                    @error('ultra_league_veteran')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->ultra_league_veteran }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Master League Veteran --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->master_league_veteran < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->master_league_veteran >= 50 && $medals->master_league_veteran < 200)
                            <div class="card-header silver-medal">
                            @elseif ($medals->master_league_veteran >= 200 && $medals->master_league_veteran < 1000)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/MasterLeague_Platinum.png') }}"
                    alt="Master League Veteran" width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Master League Veteran') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Win Trainer Battles in the Master League') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('master_league_veteran') is-invalid @enderror"
                        name="master_league_veteran" type="numeric" placeholder="0 000 000"
                        value="{{ old('master_league_veteran') }}">
                    @error('master_league_veteran')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->master_league_veteran }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Cameraman --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->cameraman < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->cameraman >= 50 && $medals->cameraman < 200)
                            <div class="card-header silver-medal">
                            @elseif ($medals->cameraman >= 200 && $medals->cameraman < 400)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Cameraman_Platinum.png') }}" alt="Cameraman"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Cameraman') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('GO Snapshot photobombs') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('cameraman') is-invalid @enderror" name="cameraman"
                        type="numeric" placeholder="0 000 000" value="{{ old('cameraman') }}">
                    @error('cameraman')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->cameraman }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Unova --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->unova < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->unova >= 50 && $medals->unova < 100)
                            <div class="card-header silver-medal">
                            @elseif ($medals->unova >= 100 && $medals->unova < 156)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Unova_Platinum.png') }}" alt="Unova"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Unova') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Unova Pokédex entries registered') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('unova') is-invalid @enderror" name="unova"
                        type="numeric" placeholder="0 000 000" value="{{ old('unova') }}">
                    @error('unova')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->unova }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Purifier --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->purifier < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->purifier >= 50 && $medals->purifier < 500)
                            <div class="card-header silver-medal">
                            @elseif ($medals->purifier >= 500 && $medals->purifier < 1000)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Purifier_Platinum.png') }}" alt="Purifier"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Purifier') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Shadow Pokémon purified') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('purifier') is-invalid @enderror" name="purifier"
                        type="numeric" placeholder="0 000 000" value="{{ old('purifier') }}">
                    @error('purifier')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->purifier }}</small>
                @endif
            </div>
        </div>
        </div>


        {{-- Hero --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->hero < 100)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->hero >= 100 && $medals->hero < 1000)
                            <div class="card-header silver-medal">
                            @elseif ($medals->hero >= 1000 && $medals->hero < 2000)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Hero_Platinum.png') }}" alt="Hero"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Hero') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Defeat Team GO Rocket members') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('hero') is-invalid @enderror" name="hero"
                        type="numeric" placeholder="0 000 000" value="{{ old('hero') }}">
                    @error('hero')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->hero }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Ultra Hero --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->ultra_hero < 5)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->ultra_hero >= 5 && $medals->ultra_hero < 20)
                            <div class="card-header silver-medal">
                            @elseif ($medals->ultra_hero >= 20 && $medals->ultra_hero < 50)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/UltraHero_Platinum.png') }}" alt="Ultra Hero"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Ultra Hero') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Defeat the Team GO Rocket Boss') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('ultra_hero') is-invalid @enderror"
                        name="ultra_hero" type="numeric" placeholder="0 000 000" value="{{ old('ultra_hero') }}">
                    @error('ultra_hero')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->ultra_hero }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Best Buddy --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->best_buddy < 10)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->best_buddy >= 10 && $medals->best_buddy < 100)
                            <div class="card-header silver-medal">
                            @elseif ($medals->best_buddy >= 100 && $medals->best_buddy < 200)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/BestBuddy_Platinum.png') }}" alt="Best Buddy"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Best Buddy') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Have Buddy Pokémon at Best Buddy level') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('best_buddy') is-invalid @enderror"
                        name="best_buddy" type="numeric" placeholder="0 000 000" value="{{ old('best_buddy') }}">
                    @error('best_buddy')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->best_buddy }}</small>
                @endif
            </div>
        </div>
        </div>

        

        {{-- Kalos --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->kalos < 25)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->kalos >= 25 && $medals->kalos < 50)
                            <div class="card-header silver-medal">
                            @elseif ($medals->kalos >= 50 && $medals->kalos < 72)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Kalos_Platinum.png') }}" alt="Kalos"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Kalos') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Kalos Pokédex entries registered') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('kalos') is-invalid @enderror" name="kalos"
                        type="numeric" placeholder="0 000 000" value="{{ old('kalos') }}">
                    @error('kalos')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->kalos }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Alola --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->alola < 25)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->alola >= 25 && $medals->alola < 50)
                            <div class="card-header silver-medal">
                            @elseif ($medals->alola >= 50 && $medals->alola < 86)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Alola_Platinum.png') }}" alt="Alola"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Alola') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Alola Pokédex entries registered') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('alola') is-invalid @enderror" name="alola"
                        type="numeric" placeholder="0 000 000" value="{{ old('alola') }}">
                    @error('alola')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->alola }}</small>
                @endif
            </div>
        </div>
        </div>


        {{-- Galar --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->galar < 25)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->galar >= 25 && $medals->galar < 50)
                            <div class="card-header silver-medal">
                            @elseif ($medals->galar >= 50 && $medals->galar < 89)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Galar_Platinum.png') }}" alt="Galar"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Galar') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Galar Pokédex entries registered') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('galar') is-invalid @enderror" name="galar"
                        type="numeric" placeholder="0 000 000" value="{{ old('galar') }}">
                    @error('galar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->galar }}</small>
                @endif

            </div>
        </div>
        </div>

        {{-- Paldea --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->paldea < 25)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->paldea >= 25 && $medals->paldea < 50)
                            <div class="card-header silver-medal">
                            @elseif ($medals->paldea >= 50 && $medals->paldea < 89)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Paldea_Platinum.webp') }}" alt="Paldea"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Paldea') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Paldea Pokédex entries registered') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('paldea') is-invalid @enderror" name="paldea"
                        type="numeric" placeholder="0 000 000" value="{{ old('paldea') }}">
                    @error('paldea')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->paldea }}</small>
                @endif

            </div>
        </div>
        </div>





        {{-- Triathlete --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->triathlete < 10)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->triathlete >= 10 && $medals->triathlete < 50)
                            <div class="card-header silver-medal">
                            @elseif ($medals->triathlete >= 50 && $medals->triathlete < 100)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Triathlete_Platinum.png') }}" alt="Triathlete"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Triathlete') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Complete 7-day streaks') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('triathlete') is-invalid @enderror"
                        name="triathlete" type="numeric" placeholder="0 000 000" value="{{ old('triathlete') }}">
                    @error('triathlete')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->triathlete }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Rising Star --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->rising_star < 10)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->rising_star >= 10 && $medals->rising_star < 50)
                            <div class="card-header silver-medal">
                            @elseif ($medals->rising_star >= 50 && $medals->rising_star < 150)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/RisingStar_Platinum.png') }}" alt="Rising Star"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Rising Star') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Unique Raid bosses defeated') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('rising_star') is-invalid @enderror"
                        name="rising_star" type="numeric" placeholder="0 000 000"
                        value="{{ old('rising_star') }}">
                    @error('rising_star')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->rising_star }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Rising Star Duo --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->rising_star_duo < 100)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->rising_star_duo >= 100 && $medals->rising_star_duo < 1000)
                            <div class="card-header silver-medal">
                            @elseif ($medals->rising_star_duo >= 1000 && $medals->rising_star_duo < 2000)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/RisingStarDuo_Platinum.png') }}"
                    alt="Rising Star Duo" width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Rising Star Duo') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Raids won with a friend') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('rising_star_duo') is-invalid @enderror"
                        name="rising_star_duo" type="numeric" placeholder="0 000 000"
                        value="{{ old('rising_star_duo') }}">
                    @error('rising_star_duo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->rising_star_duo }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Picnicker --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->picnicker < 25)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->picnicker >= 25 && $medals->picnicker < 500)
                            <div class="card-header silver-medal">
                            @elseif ($medals->picnicker >= 500 && $medals->picnicker < 2500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Picnicker_Platinum.png') }}" alt="Picnicker"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Picnicker') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Pokémon caught by other Trainers at your PokéStop Lures') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('picnicker') is-invalid @enderror"
                        name="picnicker" type="numeric" placeholder="0 000 000" value="{{ old('picnicker') }}">
                    @error('picnicker')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->picnicker }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Successor --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->successor < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->successor >= 50 && $medals->successor < 500)
                            <div class="card-header silver-medal">
                            @elseif ($medals->successor >= 500 && $medals->successor < 1000)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Successor_Platinum.png') }}" alt="Successor"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Successor') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Mega Evolve Pokémon') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('successor') is-invalid @enderror"
                        name="successor" type="numeric" placeholder="0 000 000" value="{{ old('successor') }}">
                    @error('successor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->successor }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Mega Evolution Guru --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->mega_evolution_guru < 24)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->mega_evolution_guru >= 24 && $medals->mega_evolution_guru < 36)
                            <div class="card-header silver-medal">
                            @elseif ($medals->mega_evolution_guru >= 36 && $medals->mega_evolution_guru < 46)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/MegaEvolutionGuru_Platinum.png') }}"
                    alt="Mega Evolution Guru" width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Mega Evolution Guru') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Mega Evolve unique Pokémon') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('mega_evolution_guru') is-invalid @enderror"
                        name="mega_evolution_guru" type="numeric" placeholder="0 000 000"
                        value="{{ old('mega_evolution_guru') }}">
                    @error('mega_evolution_guru')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->mega_evolution_guru }}</small>
                @endif
            </div>
        </div>
        </div>


        {{-- Expert Navigator --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->expert_navigator < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->expert_navigator >= 50 && $medals->expert_navigator < 200)
                            <div class="card-header silver-medal">
                            @elseif ($medals->expert_navigator >= 200 && $medals->expert_navigator < 600)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/ExpertNavigator.webp') }}"
                    alt="expert_navigator" width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Expert Navigator') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Complete Routes 600 times') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('expert_navigator') is-invalid @enderror"
                        name="expert_navigator" type="numeric" placeholder="0 000 000"
                        value="{{ old('expert_navigator') }}">
                    @error('expert_navigator')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->expert_navigator }}</small>
                @endif
            </div>
        </div>
        </div>


        {{-- Hisui --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->hisui < 3)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->hisui >= 3 && $medals->hisui < 5)
                            <div class="card-header silver-medal">
                            @elseif ($medals->hisui >= 5 && $medals->hisui < 7)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Hisui_Platinum.png') }}" alt="Hisui"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Hisui') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Hisui Pokédex entries registered') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('hisui') is-invalid @enderror" name="hisui"
                        type="numeric" placeholder="0 000 000" value="{{ old('hisui') }}">
                    @error('hisui')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->hisui }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Friend Finder --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->friend_finder < 10)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->friend_finder >= 10 && $medals->friend_finder < 20)
                            <div class="card-header silver-medal">
                            @elseif ($medals->friend_finder >= 20 && $medals->friend_finder < 50)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/FriendFinder_Platinum.png') }}"
                    alt="Frind Finder" width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Friend Finder') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Refer other Trainers') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('friend_finder') is-invalid @enderror"
                        name="friend_finder" type="numeric" placeholder="0 000 000"
                        value="{{ old('friend_finder') }}">
                    @error('friend_finder')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->friend_finder }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Raid Expert --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->raid_expert < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->raid_expert >= 50 && $medals->raid_expert < 200)
                            <div class="card-header silver-medal">
                            @elseif ($medals->raid_expert >= 200 && $medals->raid_expert < 500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/RaidExpert_Platinum.png') }}" alt="Raid Expert"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Raid Expert') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Earn Raid Battle Trainer Achievements') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('raid_expert') is-invalid @enderror"
                        name="raid_expert" type="numeric" placeholder="0 000 000"
                        value="{{ old('raid_expert') }}">
                    @error('raid_expert')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->raid_expert }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Tiny Pokémon Collector --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->tiny_pokemon_collector < 25)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->tiny_pokemon_collector >= 25 && $medals->tiny_pokemon_collector < 100)
                            <div class="card-header silver-medal">
                            @elseif ($medals->tiny_pokemon_collector >= 100 && $medals->tiny_pokemon_collector < 500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Small_Platinum.png') }}"
                    alt="Tiny Pokémon Collector" width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Tiny Pokémon Collector') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Catch XXS Pokémon *height') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('tiny_pokemon_collector') is-invalid @enderror"
                        name="tiny_pokemon_collector" type="numeric" placeholder="0 000 000"
                        value="{{ old('tiny_pokemon_collector') }}">
                    @error('tiny_pokemon_collector')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->tiny_pokemon_collector }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Jumbo Pokémon Collector --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->jumbo_pokemon_collector < 25)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->jumbo_pokemon_collector >= 25 && $medals->jumbo_pokemon_collector < 100)
                            <div class="card-header silver-medal">
                            @elseif ($medals->jumbo_pokemon_collector >= 100 && $medals->jumbo_pokemon_collector < 500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Large_Platinum.png') }}"
                    alt="Jumbo Pokémon Collector" width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Jumbo Pokémon Collector') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Catch XXL Pokémon *height') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('jumbo_pokemon_collector') is-invalid @enderror"
                        name="jumbo_pokemon_collector" type="numeric" placeholder="0 000 000"
                        value="{{ old('jumbo_pokemon_collector') }}">
                    @error('jumbo_pokemon_collector')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->jumbo_pokemon_collector }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- Vivillon Collector --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->vivillon_collector < 5)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->vivillon_collector >= 5 && $medals->vivillon_collector < 10)
                            <div class="card-header silver-medal">
                            @elseif ($medals->vivillon_collector >= 10 && $medals->vivillon_collector < 18)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/VivillonCollector_Platinum.png') }}"
                    alt="Vivillon Collector" width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Vivillon Collector') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Unique Vivillon patterns caught') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('vivillon_collector') is-invalid @enderror"
                        name="vivillon_collector" type="numeric" placeholder="0 000 000"
                        value="{{ old('vivillon_collector') }}">
                    @error('vivillon_collector')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->vivillon_collector }}</small>
                @endif
            </div>
        </div>
        </div>
        {{-- END CARD --}}

        {{-- Showcase Star --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->showcase_star < 10)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->showcase_star >= 10 && $medals->showcase_star < 50)
                            <div class="card-header silver-medal">
                            @elseif ($medals->showcase_star >= 50 && $medals->showcase_star < 100)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Showcasestar_Platinum.webp') }}"
                    alt="showcase_star" width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Showcase Star') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Win Pokéstop Showcases') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('showcase_star') is-invalid @enderror"
                        name="showcase_star" type="numeric" placeholder="0 000 000"
                        value="{{ old('showcase_star') }}">
                    @error('showcase_star')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->showcase_star }}</small>
                @endif
            </div>
        </div>
        </div>
        {{-- END CARD --}}


        {{-- Wayfarer --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">
                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->wayfarer < 500)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->wayfarer >= 500 && $medals->wayfarer < 1000)
                            <div class="card-header silver-medal">
                            @elseif ($medals->wayfarer >= 1000 && $medals->wayfarer < 1500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif
                <img class="img-fluid" src="{{ asset('assets/images/Wayfarer_Platinum.png') }}" alt="Wayfarer"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Wayfarer') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Earn Wayfarer agreements') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('wayfarer') is-invalid @enderror" name="wayfarer"
                        type="numeric" placeholder="0 000 000" value="{{ old('wayfarer') }}">
                    @error('wayfarer')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
            </ul>
            <div class="card-footer text-muted border-0">
                @if ($medals === null)
                    <small>{{ __('before') }}: 0</small>
                @else
                    <small>{{ __('before') }}: {{ $medals->wayfarer }}</small>
                @endif
            </div>
        </div>
        </div>
        {{-- END CARD --}}







        </div>

        <div class="form-check m-2">
            <input class="form-check-input @error('checkbox') is-invalid @enderror" type="checkbox" name="checkbox"
                id="checkbox" @if (old('checkbox')) checked @endif value="1">
            <label class="form-check-label" for="flexCheckDefault">
                {{ __('Check values before saving') }}
            </label>
            @error('checkbox')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="m-2">
            <button class="btn btn-primary">{{ __('Save') }}</button>
        </div>
        </div>




        </div>


        </form>








    </main>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>

    <script>
        $('input[name="total_xp"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="actual_stardust"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="elite_collector"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="jogger"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="kanto"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="collector"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="scientist"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="breeder"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="backpacker"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="sightseer"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="fisher"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="battle_girl"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="ace_trainer"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="youngster"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="pikachu_fan"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="unown"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="johto"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="champion"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="battle_legend"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="berry_master"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="gym_leader"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="hoenn"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="pokemon_ranger"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="idol"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="gentleman"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="pilot"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="sinnoh"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="great_league_veteran"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="ultra_league_veteran"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="master_league_veteran"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="cameraman"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="unova"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="purifier"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="hero"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="ultra_hero"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="best_buddy"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="wayfarer"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="kalos"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="alola"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="galar"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="paldea"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="hisui"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="triathlete"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="rising_star"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="rising_star_duo"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="picnicker"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="successor"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="mega_evolution_guru"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="expert_navigator"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="friend_finder"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="raid_expert"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="tiny_pokemon_collector"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="jumbo_pokemon_collector"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="vivillon_collector"]').mask('000 000 000 000 000', {
            reverse: true
        });
    </script>
@endsection
