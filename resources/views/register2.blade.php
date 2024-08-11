<!--
### TIMID0x - 2023-08-23T10:00:51.000-05:00
-->
@extends('layouts.template-form')

@section('title', 'Register')

@section('contenido')

    <main>
        <section class="h-100">
            <div class="container">
                <div class="row justify-content-sm-center">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                        <div class="text-center my-3">
                            <a href="/"><img
                                    src="{{ asset('assets/images/logo_n36bgc.png') }}"
                                    alt="TIMID0x" width="75" height="75"></a>
                        </div>
                        <div class="card shadow-lg">
                            <div class="card-body p-4">
                                <!-- box register-->
                                <h1 class="fs-4 card-title fw-bold mb-4">Register</h1>
                                <form action="/register2" method="POST" class="needs-validation" novalidate=""
                                    autocomplete="off">
                                    @csrf
                                    <div class="mb-2">
                                        <!-- box username-->
                                        <label class="mb-2 text-muted" for="name">Username</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="" required autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <!-- box email-->
                                        <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <!-- box country-->
                                        <label for="country" class="form-label" required="required">Country:</label>
                                        <select class="form-select" name="country_id">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }} -
                                                    {{ $country->code }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-2">
                                        <!-- box password-->
                                        <label class="mb-2 text-muted" for="password">Password</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-2">
                                        <!-- box pass confirm-->
                                        <label class="mb-2 text-muted" for="password">Confirm Password</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password_confirmation" required>

                                    </div>


                                    <p class="form-text text-muted mb-3">
                                        By registering you agree with our terms and condition.
                                    </p>

                                    <div class="align-items-center d-flex">
                                        <button type="submit" class="btn btn-primary ms-auto">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer py-2 border-0">
                                <div class="text-center">
                                    Already have an account? <a href="{{ route('tl50data') }}" class="text-dark">Login</a>
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
