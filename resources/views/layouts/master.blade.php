<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">

    <style>
        #question-list-table {
            border-collapse: collapse;
            width: 100%;
        }

        #question-list-table td {
            width: 100px;
            word-wrap: break-word;
        }

        .visibilty-hidden {
            visibility: hidden;
        }

        .btn-delete-remove-q {
            background: #f46a6a;
            ;
            color: #fff;
            margin-left: 10px;
            padding: 7px;
            font-size: 15px;
            cursor: pointer;
            border-radius: 6px;
        }

        .add-question-trash-can {
            padding-right: 3px;
        }

        .add-question-submit-btn {
            font-size: 16px !important;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #556ee6;
            border-radius: 10px;
        }
    </style>
    @include('layouts.head-css')
</head>

@section('body')

    <body data-sidebar="dark">
    @show
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.topbar')
        @include('layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    @yield('content')
                </div>
                <!-- container-fluid -->


            </div>
            <!-- End Page-content -->
            @include('layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    @include('layouts.right-sidebar')
    <!-- /Right-bar -->

    <!-- JAVASCRIPT -->
    @include('layouts.vendor-scripts')
</body>

</html>
