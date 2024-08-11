<!--
### TIMID0x - 2023-10-23T14:27:35.000-05:00
-->
@extends('layouts.template-core')

@section('title', 'Create Medal Type')

@section('medaltype-link', 'active')

@section('contenido')
    <main>


        <div class="container m-1">
            <div class="mt-3 pull-left">
                <h2>{{ __('Create Medal Types') }}</h2>
            </div>

            <div class="mt-4">
                <form action="{{ route('medaltype.postcreate') }}" method="POST">
                    @csrf

                    <div class="row row-cols-2 row-cols-md-4 row-cols-xl-6 g-3">


                        {{-- schoolkid --}}
                        <div class="col d-flex align-items-stretch">
                            <div class="card" style="max-width: 12rem;">

                                @if ($medals === null)
                                    <div class="card-header bronze-medal">
                                    @elseif ($medals->schoolkid < 50)
                                        <div class="card-header bronze-medal">
                                        @elseif ($medals->schoolkid >= 50 && $medals->schoolkid < 200)
                                            <div class="card-header silver-medal">
                                            @elseif ($medals->schoolkid >= 200 && $medals->schoolkid < 2500)
                                                <div class="card-header gold-medal">
                                                @else
                                                    <div class="card-header platinum-medal">
                                @endif


                                <img class="img-fluid" src="{{ asset('assets/images/Schoolkid_Platinum.png') }}"
                                    alt="schoolkid" width="50" height="50">
                                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Schoolkid') }}</span></div>
                            </div>
                            <div class="card-body border-0">
                                <p class="card-text">{{ __('Normal-type caught') }}</p>
                            </div>
                            <ul class="list-group list-group-flush border-0">
                                <li class="list-group-item">
                                    <input class="form-control form-control-sm @error('schoolkid') is-invalid @enderror"
                                        name="schoolkid" type="numeric" placeholder="0 000 000"
                                        value="{{ old('schoolkid') }}">
                                    @error('schoolkid')
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
                                    <small>{{ __('before') }}: {{ $medals->schoolkid }}</small>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- black_belt --}}
                    <div class="col d-flex align-items-stretch">
                        <div class="card" style="max-width: 12rem;">

                            @if ($medals === null)
                                <div class="card-header bronze-medal">
                                @elseif ($medals->black_belt < 50)
                                    <div class="card-header bronze-medal">
                                    @elseif ($medals->black_belt >= 50 && $medals->black_belt < 200)
                                        <div class="card-header silver-medal">
                                        @elseif ($medals->black_belt >= 200 && $medals->black_belt < 2500)
                                            <div class="card-header gold-medal">
                                            @else
                                                <div class="card-header platinum-medal">
                            @endif


                            <img class="img-fluid" src="{{ asset('assets/images/BlackBelt_Platinum.png') }}"
                                alt="black_belt" width="50" height="50">
                            <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Black Belt') }}</span></div>
                        </div>
                        <div class="card-body border-0">
                            <p class="card-text">{{ __('Fighting-type caught') }}</p>
                        </div>
                        <ul class="list-group list-group-flush border-0">
                            <li class="list-group-item">
                                <input class="form-control form-control-sm @error('black_belt') is-invalid @enderror"
                                    name="black_belt" type="numeric" placeholder="0 000 000"
                                    value="{{ old('black_belt') }}">
                                @error('black_belt')
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
                                <small>{{ __('before') }}: {{ $medals->black_belt }}</small>
                            @endif
                        </div>
                    </div>
            </div>

            {{-- bird_keeper --}}
            <div class="col d-flex align-items-stretch">
                <div class="card" style="max-width: 12rem;">

                    @if ($medals === null)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->bird_keeper < 50)
                            <div class="card-header bronze-medal">
                            @elseif ($medals->bird_keeper >= 50 && $medals->bird_keeper < 200)
                                <div class="card-header silver-medal">
                                @elseif ($medals->bird_keeper >= 200 && $medals->bird_keeper < 2500)
                                    <div class="card-header gold-medal">
                                    @else
                                        <div class="card-header platinum-medal">
                    @endif


                    <img class="img-fluid" src="{{ asset('assets/images/BirdKeeper_Platinum.png') }}" alt="bird_keeper"
                        width="50" height="50">
                    <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Bird Keeper') }}</span></div>
                </div>
                <div class="card-body border-0">
                    <p class="card-text">{{ __('Flying-type caught') }}</p>
                </div>
                <ul class="list-group list-group-flush border-0">
                    <li class="list-group-item">
                        <input class="form-control form-control-sm @error('bird_keeper') is-invalid @enderror"
                            name="bird_keeper" type="numeric" placeholder="0 000 000" value="{{ old('bird_keeper') }}">
                        @error('bird_keeper')
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
                        <small>{{ __('before') }}: {{ $medals->bird_keeper }}</small>
                    @endif
                </div>
            </div>
        </div>


        {{-- punk_girl --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">

                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->punk_girl < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->punk_girl >= 50 && $medals->punk_girl < 200)
                            <div class="card-header silver-medal">
                            @elseif ($medals->punk_girl >= 200 && $medals->punk_girl < 2500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif


                <img class="img-fluid" src="{{ asset('assets/images/PunkGirl_Platinum.png') }}" alt="punk_girl"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Punk Girl') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Poison-type caught') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('punk_girl') is-invalid @enderror" name="punk_girl"
                        type="numeric" placeholder="0 000 000" value="{{ old('punk_girl') }}">
                    @error('punk_girl')
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
                    <small>{{ __('before') }}: {{ $medals->punk_girl }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- ruin_maniac --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">

                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->ruin_maniac < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->ruin_maniac >= 50 && $medals->ruin_maniac < 200)
                            <div class="card-header silver-medal">
                            @elseif ($medals->ruin_maniac >= 200 && $medals->ruin_maniac < 2500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif


                <img class="img-fluid" src="{{ asset('assets/images/RuinManiac_Platinum.png') }}" alt="ruin_maniac"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Ruin Maniac') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Ground-type caught') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('ruin_maniac') is-invalid @enderror"
                        name="ruin_maniac" type="numeric" placeholder="0 000 000" value="{{ old('ruin_maniac') }}">
                    @error('ruin_maniac')
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
                    <small>{{ __('before') }}: {{ $medals->ruin_maniac }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- hiker --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">

                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->hiker < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->hiker >= 50 && $medals->hiker < 200)
                            <div class="card-header silver-medal">
                            @elseif ($medals->hiker >= 200 && $medals->hiker < 2500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif


                <img class="img-fluid" src="{{ asset('assets/images/Hiker_Platinum.png') }}" alt="hiker"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Hiker') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Rock-type caught') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('hiker') is-invalid @enderror" name="hiker"
                        type="numeric" placeholder="0 000 000" value="{{ old('hiker') }}">
                    @error('hiker')
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
                    <small>{{ __('before') }}: {{ $medals->hiker }}</small>
                @endif
            </div>
        </div>
        </div>



        {{-- bug_catcher --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">

                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->bug_catcher < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->bug_catcher >= 50 && $medals->bug_catcher < 200)
                            <div class="card-header silver-medal">
                            @elseif ($medals->bug_catcher >= 200 && $medals->bug_catcher < 2500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif


                <img class="img-fluid" src="{{ asset('assets/images/BugCatcher_Platinum.png') }}" alt="bug_catcher"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Bug Catcher') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Bug-type caught') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('bug_catcher') is-invalid @enderror"
                        name="bug_catcher" type="numeric" placeholder="0 000 000" value="{{ old('bug_catcher') }}">
                    @error('bug_catcher')
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
                    <small>{{ __('before') }}: {{ $medals->bug_catcher }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- hex_maniac --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">

                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->hex_maniac < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->hex_maniac >= 50 && $medals->hex_maniac < 200)
                            <div class="card-header silver-medal">
                            @elseif ($medals->hex_maniac >= 200 && $medals->hex_maniac < 2500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif


                <img class="img-fluid" src="{{ asset('assets/images/HexManiac_Platinum.png') }}" alt="hex_maniac"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Hex Maniac') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Ghost-type caught') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('hex_maniac') is-invalid @enderror"
                        name="hex_maniac" type="numeric" placeholder="0 000 000" value="{{ old('hex_maniac') }}">
                    @error('hex_maniac')
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
                    <small>{{ __('before') }}: {{ $medals->hex_maniac }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- rail_staff --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">

                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->rail_staff < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->rail_staff >= 50 && $medals->rail_staff < 200)
                            <div class="card-header silver-medal">
                            @elseif ($medals->rail_staff >= 200 && $medals->rail_staff < 2500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif


                <img class="img-fluid" src="{{ asset('assets/images/RailStaff_Platinum.png') }}" alt="rail_staff"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Rail Staff') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Steel-type caught') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('rail_staff') is-invalid @enderror"
                        name="rail_staff" type="numeric" placeholder="0 000 000" value="{{ old('rail_staff') }}">
                    @error('rail_staff')
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
                    <small>{{ __('before') }}: {{ $medals->rail_staff }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- kindler --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">

                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->kindler < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->kindler >= 50 && $medals->kindler < 200)
                            <div class="card-header silver-medal">
                            @elseif ($medals->kindler >= 200 && $medals->kindler < 2500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif


                <img class="img-fluid" src="{{ asset('assets/images/Kindler_Platinum.png') }}" alt="kindler"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Kindler') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Fire-type caught') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('kindler') is-invalid @enderror" name="kindler"
                        type="numeric" placeholder="0 000 000" value="{{ old('kindler') }}">
                    @error('kindler')
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
                    <small>{{ __('before') }}: {{ $medals->kindler }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- swimmer --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">

                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->swimmer < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->swimmer >= 50 && $medals->swimmer < 200)
                            <div class="card-header silver-medal">
                            @elseif ($medals->swimmer >= 200 && $medals->swimmer < 2500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif


                <img class="img-fluid" src="{{ asset('assets/images/Swimmer_Platinum.png') }}" alt="swimmer"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Swimmer') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Water-type caught') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('swimmer') is-invalid @enderror" name="swimmer"
                        type="numeric" placeholder="0 000 000" value="{{ old('swimmer') }}">
                    @error('swimmer')
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
                    <small>{{ __('before') }}: {{ $medals->swimmer }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- gardener --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">

                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->gardener < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->gardener >= 50 && $medals->gardener < 200)
                            <div class="card-header silver-medal">
                            @elseif ($medals->gardener >= 200 && $medals->gardener < 2500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif


                <img class="img-fluid" src="{{ asset('assets/images/Gardener_Platinum.png') }}" alt="gardener"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Gardener') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Grass-type caught') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('gardener') is-invalid @enderror" name="gardener"
                        type="numeric" placeholder="0 000 000" value="{{ old('gardener') }}">
                    @error('gardener')
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
                    <small>{{ __('before') }}: {{ $medals->gardener }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- rocker --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">

                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->rocker < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->rocker >= 50 && $medals->rocker < 200)
                            <div class="card-header silver-medal">
                            @elseif ($medals->rocker >= 200 && $medals->rocker < 2500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif


                <img class="img-fluid" src="{{ asset('assets/images/Rocker_Platinum.png') }}" alt="rocker"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Rocker') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Electric-type caught') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('rocker') is-invalid @enderror" name="rocker"
                        type="numeric" placeholder="0 000 000" value="{{ old('rocker') }}">
                    @error('rocker')
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
                    <small>{{ __('before') }}: {{ $medals->rocker }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- psychic --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">

                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->psychic < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->psychic >= 50 && $medals->psychic < 200)
                            <div class="card-header silver-medal">
                            @elseif ($medals->psychic >= 200 && $medals->psychic < 2500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif


                <img class="img-fluid" src="{{ asset('assets/images/Psychic_Platinum.png') }}" alt="psychic"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Psychic') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Psychic-type caught') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('psychic') is-invalid @enderror" name="psychic"
                        type="numeric" placeholder="0 000 000" value="{{ old('psychic') }}">
                    @error('psychic')
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
                    <small>{{ __('before') }}: {{ $medals->psychic }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- skier --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">

                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->skier < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->skier >= 50 && $medals->skier < 200)
                            <div class="card-header silver-medal">
                            @elseif ($medals->skier >= 200 && $medals->skier < 2500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif


                <img class="img-fluid" src="{{ asset('assets/images/Skier_Platinum.png') }}" alt="skier"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Skier') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Ice-type caught') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('skier') is-invalid @enderror" name="skier"
                        type="numeric" placeholder="0 000 000" value="{{ old('skier') }}">
                    @error('skier')
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
                    <small>{{ __('before') }}: {{ $medals->skier }}</small>
                @endif
            </div>
        </div>
        </div>

        {{-- dragon_tamer --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">

                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->dragon_tamer < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->dragon_tamer >= 50 && $medals->dragon_tamer < 200)
                            <div class="card-header silver-medal">
                            @elseif ($medals->dragon_tamer >= 200 && $medals->dragon_tamer < 2500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif


                <img class="img-fluid" src="{{ asset('assets/images/DragonTamer_Platinum.png') }}" alt="dragon_tamer"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Dragon Tamer') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Dragon-type caught') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('dragon_tamer') is-invalid @enderror"
                        name="dragon_tamer" type="numeric" placeholder="0 000 000" value="{{ old('dragon_tamer') }}">
                    @error('dragon_tamer')
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
                    <small>{{ __('before') }}: {{ $medals->dragon_tamer }}</small>
                @endif
            </div>
        </div>
        </div>



        {{-- delinquent --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">

                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->delinquent < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->delinquent >= 50 && $medals->delinquent < 200)
                            <div class="card-header silver-medal">
                            @elseif ($medals->delinquent >= 200 && $medals->delinquent < 2500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif


                <img class="img-fluid" src="{{ asset('assets/images/Delinquent_Platinum.png') }}" alt="delinquent"
                    width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Delinquent') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Dark-type caught') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('delinquent') is-invalid @enderror"
                        name="delinquent" type="numeric" placeholder="0 000 000" value="{{ old('delinquent') }}">
                    @error('delinquent')
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
                    <small>{{ __('before') }}: {{ $medals->delinquent }}</small>
                @endif
            </div>
        </div>
        </div>







        {{-- fairytale_girl --}}
        <div class="col d-flex align-items-stretch">
            <div class="card" style="max-width: 12rem;">

                @if ($medals === null)
                    <div class="card-header bronze-medal">
                    @elseif ($medals->fairytale_girl < 50)
                        <div class="card-header bronze-medal">
                        @elseif ($medals->fairytale_girl >= 50 && $medals->fairytale_girl < 200)
                            <div class="card-header silver-medal">
                            @elseif ($medals->fairytale_girl >= 200 && $medals->fairytale_girl < 2500)
                                <div class="card-header gold-medal">
                                @else
                                    <div class="card-header platinum-medal">
                @endif


                <img class="img-fluid" src="{{ asset('assets/images/FairyTaleGirl_Platinum.png') }}"
                    alt="fairytale_girl" width="50" height="50">
                <div class="fw-bold"><span style="margin-left: 2px;">{{ __('Fairy Tale Girl') }}</span></div>
            </div>
            <div class="card-body border-0">
                <p class="card-text">{{ __('Fairy-type caught') }}</p>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <input class="form-control form-control-sm @error('fairytale_girl') is-invalid @enderror"
                        name="fairytale_girl" type="numeric" placeholder="0 000 000"
                        value="{{ old('fairytale_girl') }}">
                    @error('fairytale_girl')
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
                    <small>{{ __('before') }}: {{ $medals->fairytale_girl }}</small>
                @endif
            </div>
        </div>
        </div>









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
    {{-- JS JQuery Mask --}}
    <script src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>

    <script>
        $('input[name="schoolkid"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="black_belt"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="bird_keeper"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="punk_girl"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="ruin_maniac"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="hiker"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="bug_catcher"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="hex_maniac"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="rail_staff"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="kindler"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="swimmer"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="gardener"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="rocker"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="psychic"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="skier"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="dragon_tamer"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="delinquent"]').mask('000 000 000 000 000', {
            reverse: true
        });
        $('input[name="fairytale_girl"]').mask('000 000 000 000 000', {
            reverse: true
        });
    </script>

@endsection
