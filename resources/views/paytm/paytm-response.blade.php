<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="" rel="icon">
    <link href="" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        body {
            text-align: center;
            padding: 40px 0;
            background: #EBF0F5;
        }

        h1 {
            color: #4BB543;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-weight: 900;
            font-size: 40px;
            margin-bottom: 15px;
        }

        p {
            color: #404F5E;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-size: 20px;
            margin: 0;
        }

        i {
            color: #4BB543;
            font-size: 100px;
            line-height: 200px;
            margin-left: -15px;
        }

        .card {
            background: white;
            padding: 60px;
            border-radius: 4px;
            box-shadow: 0 2px 3px #C8D0D8;
            display: inline-block;
            margin: 0 auto;
            width: 70%;
        }

        .payment-detail-css {
            text-align: left;
            font-size: 16px;
            font-weight: bold;
            margin-top: 4rem;
        }
    </style>
</head>
@if ($order->paymentstatus == 'TXN_SUCCESS')
    @if (Session::has('redirect'))

        <body>
            <div class="container">
                <div class="card">
                    <div
                        style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto; margin-bottom:20px">
                        <i class="checkmark">✓</i>
                    </div>
                    <h1>Payment Success</h1>
                    <p>Thank you, your payment has been successful.</p>
                    <div>
                        <p class="text-uppercase text-left payment-detail-css" style="">
                            Payment Details</p>
                    </div>

                    <hr>



                    <div class="table-responsive mt-3">
                        <table class="table align-middle table-nowrap">
                            <tbody>

                                <tr>
                                    <td class="col-md-6">
                                        <p class="mb-0 text-uppercase"
                                            style="font-size:16px;text-align:left;font-weight:bold">Order Ref</p>
                                    </td>
                                    <td style="width: 25%">
                                        <h5 class="mb-0" style="text-align:left;font-size:19px">
                                            {{ $order->ORDER_ID }}
                                        </h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-6">
                                        <p class="mb-0 text-uppercase"
                                            style="font-size:16px;text-align:left;font-weight:bold">Order Date
                                        </p>
                                    </td>
                                    <td class="col-md-6">
                                        <h5 class="mb-0" style="text-align:left;font-size:19px"> @php
                                            echo date('F j, Y, g:i a', strtotime($order->date));
                                        @endphp
                                        </h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-6">
                                        <p class="mb-0 text-uppercase"
                                            style="font-size:16px;text-align:left;font-weight:bold">Txn id</p>
                                    </td>
                                    <td class="col-md-6">
                                        <h5 class="mb-0" style="text-align:left;font-size:19px">
                                            {{ $order->transaction_id }}
                                        </h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-6">
                                        <p class="mb-0 text-uppercase"
                                            style="font-size:16px;text-align:left;font-weight:bold">txn amount
                                        </p>
                                    </td>
                                    <td class="col-md-6">
                                        <h5 class="mb-0" style="text-align:left;font-size:19px">
                                            {{ $order->TXN_AMOUNT }}
                                        </h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-md-6">
                                        <p class="mb-0 text-uppercase"
                                            style="font-size:16px;text-align:left;font-weight:bold">Status</p>
                                    </td>
                                    <td class="col-md-6">
                                        <h5 class="mb-0" style="text-align:left;font-size:19px">
                                            {{ $order->paymentstatus }}</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="">
                        <button type="button" class="btn btn-primary btn-lg" style=" margin-left: -7rem;"
                            onclick="window.location.href='/'">Home</button>
                    </div>


                </div>
            </div>



        </body>
    @else
        <script>
            window.location.href = '/';
        </script>
    @endif
@else

    <body>
        <div class="card">
            <div style="border-radius:200px; height:200px; width:200px; background: #f8f8ff; margin:0 auto;">
                <i class="" style="color:rgb(219, 64, 64)">✖</i>
            </div>
            <h1 style="color:rgb(219, 64, 64);margin-top:2rem">Failure</h1>
            <p style="margin-top:2rem;color:rgb(112, 108, 108)">Please try again, for successful payment success</p>
        </div>

    </body>
@endif

</html>
