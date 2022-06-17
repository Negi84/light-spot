{{-- @php
$password = 'vipin';
echo password_hash($password, PASSWORD_BCRYPT);
die();
@endphp --}}

@extends('layouts.master-without-nav')

@section('title')
    Login Page
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/owl.carousel/owl.carousel.min.css') }}">
    <style>
        .login-panel-first-logo {
            width: 56%;
        }

        .login-panel-second-logo {

            margin-left: auto;
            margin-right: auto;

            margin-bottom: 2rem;
        }

        .mt_9 {
            margin-top: 9rem;
        }
    </style>
@endsection

@section('body')

    <body class="auth-body-bg">
    @endsection

    @section('content')
        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">

                    <div class="col-xl-9">
                        <div class="auth-full-bg pt-lg-1 p-4">
                            <div class="w-100">
                                <div class="bg-overlay"></div>
                                <div class="d-flex h-100 flex-column">

                                    <div class="p-4 mt_9">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7">
                                                <div class="text-center">
                                                    <div dir="ltr">
                                                        <div class="owl-carousel owl-theme auth-review-carousel"
                                                            id="auth-review-carousel">
                                                            <div class="item">
                                                                <div class="py-3">
                                                                    <p class="font-size-16 mb-4 text-center">
                                                                    </p>
                                                                    <div>
                                                                        <img class="login-panel-second-logo"
                                                                            src="{{ asset('assets/images/light-spot-logo.png') }}"
                                                                            alt="loding image"
                                                                            style="width: 50% !important;">
                                                                    </div>
                                                                    {{-- <p class="font-size-16 mb-4 text-md-center">Broadcast
                                                                        Engineering
                                                                        Consultants India Limited (BECIL) an ISO 9001:2015,
                                                                        ISO 27001:2013 and ISO/IEC 20000:2012 certified,
                                                                        Mini Ratna, Central Public Sector Enterprise of
                                                                        Government of India.
                                                                    </p> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3">
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100">

                                <div class="d-flex flex-column h-100">
                                    <div class="my-auto">

                                        <div>
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p class="text-muted">Sign in to continue.</p>
                                        </div>

                                        <div class="mt-4">
                                            <form class="form-horizontal" method="POST" action="/index">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Email</label>
                                                    <input name="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        value="" id="username" placeholder="Enter Email" autofocus
                                                        autocomplete="off">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <div class="float-end">
                                                    </div>
                                                    <label class="form-label">Password</label>
                                                    <div
                                                        class="input-group auth-pass-inputgroup @error('password') is-invalid @enderror">
                                                        <input type="password" name="password"
                                                            class="form-control  @error('password') is-invalid @enderror"
                                                            id="userpassword" value="" placeholder="Enter password"
                                                            aria-label="Password" aria-describedby="password-addon">
                                                        <button class="btn btn-light " type="button" id="password-addon"><i
                                                                class="mdi mdi-eye-outline"></i></button>
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="badge badge-danger text-danger"
                                                    @if (Session::has('fail')) style="visibility: visible;font-size: 12px;" @else style="visibility: hidden;font-size: 12px;" @endif>
                                                    {{ Session::get('fail') }}</div>

                                                <div class="mt-3 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light"
                                                        type="submit">Log
                                                        In</button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>


                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </div>
    @endsection
    @section('script')
        <!-- owl.carousel js -->
        <script src="{{ URL::asset('/assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>
        <!-- auth-2-carousel init -->
        <script src="{{ URL::asset('/assets/js/pages/auth-2-carousel.init.js') }}"></script>
    @endsection
