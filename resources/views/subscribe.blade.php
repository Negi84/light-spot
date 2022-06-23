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
                    <h2>Subscribe</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Subscribe</li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- End Breadcrumbs -->

        <section class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 d-flex align-items-stretch"></div>
                    <div class="col-lg-6 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <form action="{{ route('paytm.payment') }}" method="post" role="form" class="php-email-form">
                            @csrf
                            <h4 style="text-align:center;">Subscribe</h4>
                            <div class="form-group mt-3">
                                <label for="name">Email ID</label>
                                <input type="email" class="form-control" name="email" autocorrect="nope"
                                    autocomplete="nope" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="name">Mobile Number</label>
                                <input for="mobile" class="form-control" autocorrect="nope" autocomplete="nope"
                                    placeholder="9899000000" data-prompt-position="bottomLeft" maxlength="10"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    type="text" name="mobile" required />
                            </div>

                            <div class="form-group mt-3">
                                <label for="name">Password</label>
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                                    required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="name">Select your class</label>
                                <select for="class" name="select_class" id="signup_class_list" class="form-control"
                                    required>
                                    <option value="" selected disabled>Select class</option>
                                    @foreach ($standards as $keyStandard => $valueStandard)
                                        <option value="{{ $valueStandard->class_id }}">
                                            {{ $valueStandard->class_name }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="name">Select board or exam preparing for</label>
                                <select for="class" name="select_board" class="form-control">
                                    <option value="" selected disabled>Select board/exam</option>
                                    @foreach ($boards as $keyboard => $valueboard)
                                        <option value="{{ $valueboard->board_id }}">{{ $valueboard->board_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="name">School Name</label>
                                <input type="text" class="form-control" name="school_name" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="name">City Name</label>
                                <input type="text" class="form-control" name="city" required>
                            </div>

                            <div style="display:none">
                                <!-- required fields for payment gateway start -->
                                <input id="ORDER_ID" tabindex="1" maxlength="20" size="20" type="hidden"
                                    name="ORDER_ID" autocomplete="off" value="<?php echo 'ORDS' . rand(10000, 99999999); ?>">
                                <input id="CUST_ID" tabindex="2" maxlength="12" size="12" type="hidden"
                                    name="CUST_ID" autocomplete="off" value="CUST00108">
                                <input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" type="hidden"
                                    name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
                                <input id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" type="hidden"
                                    name="CHANNEL_ID" autocomplete="off" value="WEB">
                                <input title="TXN_AMOUNT" id="amount" tabindex="10" type="hidden"
                                    name="TXN_AMOUNT" value="1">
                                <input type="hidden" name="formname" value="From subscribe now landing page">
                                <!-- required fields for payment gateway end -->
                            </div>

                            <p class="text signuptxt">By creating this account, you agree to our <a target="_blank"
                                    href="https://www.topperlearning.com/terms-and-conditions"
                                    title="Terms of services">Terms Of Services </a>&amp; <a target="_blank"
                                    href="https://www.topperlearning.com/privacy-policy" title="Privacy Policy">Privacy
                                    Policy.</a></p>
                            <div class="my-3">
                                <div class="loading">Loading</div>

                                <?php /* if((isset($_GET['var'])) && (!empty($_GET['var'])) && ($_GET['var'] == 'paymentfalse')){ ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?> ?>
                                ?>
                                ?>
                                ?>
                                ?>
                                ?>
                                ?>
                                ?>
                                ?>
                                ?>
                                ?>
                                ?>
                                ?>
                                ?>
                                ?>
                                ?>
                                ?>
                                <div style="display:block;" class="error-message">Something went wrong please try
                                    again later.</div>
                                <?php }else{ ?>
                                <div style="display:block;" class="error-message">Please fill the form correctly.
                                </div>
                                <?php } */?>
                            </div>
                            <div class="text-center"><button type="submit">Continue</button></div>
                        </form>
                    </div>
                    <div class="col-lg-3 d-flex align-items-stretch"></div>
                </div>
            </div>
        </section>
        <!-- End Contact Section -->

    </main>
    <!-- End #main -->
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'functions.php',
                data: {
                    action: 'get_classes'
                },
                type: 'post',
                success: function(output) {
                    console.log(output);
                }
            });
        });
    </script>

    <script>
        $('#signup_class_list').change(function() {
            var amount = $(this).val();
            $('#amount').val(amount);
        });
    </script>
@endsection
