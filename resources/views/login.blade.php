@extends('front-end-layouts.master')
@section('title')
    Light Spot Pvt. Ltd.
@endsection
@section('main')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Login</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Login</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section id="contact" class="contact">
            <div class="container">



                <div class="row">

                    <div class="col-lg-4 d-flex align-items-stretch">&nbsp;</div>
                    <div class="col-lg-4 d-flex align-items-stretch">


                        <form action="" method="post" role="form" class="php-email-form">
                            <h4 style="text-align:center;">Login</h4>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="name">Email ID</label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                </div>

                            </div>
                            <div class="form-group mt-3">
                                <label for="name">Password</label>
                                <input type="text" class="form-control" name="subject" id="subject" required>
                            </div>

                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>

                            <div class="text-center"><button type="submit">Sign In</button></div>
                        </form>

                    </div>

                    <div class="col-lg-4 d-flex align-items-stretch">&nbsp;</div>


                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
