<!--
### TIMID0x - 2023-08-23T09:41:03.000-05:00
-->
@extends('layouts.template-form')

@section('title', 'Forgot password')

@section('contenido')

    <main>

        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-sm-center h-100">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                        <div class="text-center my-3">
                            <a href="/tl50data"><img
                                    src="{{ asset('assets/images/logo_n36bgc.png') }}"
                                    alt="TIMID0x" width="75" height="75"></a>
                        </div>
                        <div class="card shadow-lg">
                            <div class="card-body p-5">
                                <h1 class="fs-4 card-title fw-bold mb-4">Forgot Password</h1>
                                <form action="{{ route('forgot-password') }}" method="POST" class="needs-validation"
                                    novalidate="" autocomplete="off">
                                    @csrf

                                    @if (Session::has('alert-success'))
                                        <div class="alert alert-success alert-dismissible fade show">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                            {{ Session::get('alert-success') }}
                                        </div>
                                    @elseif (Session::has('alert-failed'))
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                            {{ Session::get('alert-failed') }}
                                        </div>
                                    @endif

                                    <div class="mb-3">
                                        <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="" required autofocus>
                                        <div class="invalid-feedback">
                                            Email is invalid
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <button type="submit" class="btn btn-primary ms-auto">
                                            Send Link
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer py-3 border-0">
                                <div class="text-center">
                                    Remember your password? <a href="/tl50data" class="text-dark">Login</a>
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
