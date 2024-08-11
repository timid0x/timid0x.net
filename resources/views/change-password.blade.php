<!--
### TIMID0x - 2023-08-23T09:41:03.000-05:00
-->
@extends('layouts.template-form')

@section('title', 'Login')

@section('contenido')


    <main>

        <div class="container py-5">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
                    <div class="text-center my-3">
                        <a href="/tl50data"><img
                                src="{{ asset('assets/images/logo_n36bgc.png') }}"
                                alt="TIMID0x" width="75" height="75"></a>
                    </div>
                    <form action="{{ route('reset-password') }}" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="card shadow">

                            @if (Session::has('alert-success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    {{ Session::get('success') }}
                                </div>
                            @elseif (Session::has('alert-failed'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    {{ Session::get('failed') }}
                                </div>
                            @endif

                            <div class="card-header">
                                <h5 class="card-title"> Change Password </h5>
                            </div>

                            <div class="card-body px-4">

                                <input type="hidden" name="email" value="{{ $email }} " />

                                <div class="form-group py-2">
                                    <label> Password </label>
                                    <input type="password" name="password"
                                        class="form-control {{ $errors->first('password') ? 'is-invalid' : '' }}"
                                        value="{{ old('password') }}" placeholder="New Password">
                                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group py-2">
                                    <label> Confirm Password </label>
                                    <input type="password" name="confirm_password"
                                        class="form-control {{ $errors->first('confirm_password') ? 'is-invalid' : '' }}"
                                        value="{{ old('confirm_password') }}" placeholder="Confirm Password">
                                    {!! $errors->first('confirm_password', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"> Change Password </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </main>
@endsection

@section('footer-fixed', '')
