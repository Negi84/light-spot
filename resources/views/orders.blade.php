@extends('layouts.master')
@section('title')
    Orders List
@endsection
@section('css')
    <style>
        .dropdown-height-manage {
            max-height: 250px;
            overflow: auto;
        }
    </style>
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div style="">
            <form class="app-search d-none d-lg-block" method="GET">
                <div class="position-relative">
                    <input type="text" class="form-control" name="search"
                        @if (isset(request()->search)) value="{{ request()->search }}"  @else placeholder="Search name..." @endif>
                    <span class="bx bx-search-alt"></span>
                </div>
            </form>
        </div>
        <div class="d-flex">
            <form action="{{ route('orders') }}" method="GET" class="d-flex">
                <div class="me-3">
                    {{-- <label for="start_date">Start from</label> --}}
                    <input type="text" placeholder="Starting Date" name="start_date" id="start_date"
                        class="form-control input-sm"
                        value="{{ isset(request()->start_date) ? request()->start_date : '' }}"
                        onfocus="(this.type='date')" required>
                </div>
                <div class="me-3">
                    {{-- <label for="end_date">End to</label> --}}
                    <input type="text" placeholder="Ending Date" name="end_date" id="end_date"
                        class="form-control input-sm" value="{{ isset(request()->end_date) ? request()->end_date : '' }}"
                        onfocus="(this.type='date')" required>
                </div>
                <div>
                    {{-- <label class="invisible">test</label> --}}
                    <button type="submit" class="form-control">Submit</button>
                </div>


            </form>
        </div>
        <div class="status-btn">
            <div class="btn-group" style="">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <span class="analytics-all-btn dropdown-selection" data-main="paymentstatus"
                        data-value="@php echo isset(request()->paymentstatus)?request()->paymentstatus :'select'@endphp">
                        @if (isset(request()->paymentstatus))
                            {{ request()->paymentstatus }}
                        @else
                            Select Payment Status
                        @endif
                    </span>
                    <i class="mdi mdi-chevron-down"></i>
                </button>
                <div class="dropdown-menu status-id  dropdown-height-manage">
                    <a class="dropdown-item text-capitalize" href="#" data-type='paymentstatus' data-value="all"
                        @if (request()->paymentstatus == 'all') style="background: #c2cef5;" @endif>All Status</a>
                    <a class="dropdown-item text-capitalize" href="#" data-type='paymentstatus' data-value="success"
                        @if (request()->paymentstatus == 'success') style="background: #c2cef5;" @endif>success</a>
                    <a class="dropdown-item text-capitalize" href="#" data-type='paymentstatus' data-value="failure"
                        @if (request()->paymentstatus == 'failure') style="background: #c2cef5;" @endif>failure</a>
                </div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Payment Id</th>
                                    <th scope="col">Order Id</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Payment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($allOrders as $order)
                                    <tr>
                                        <td>
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-dark">{{ ucfirst($order['payment_id']) ?? '' }}</a></h5>
                                        </td>
                                        <td>
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-dark">{{ $order['ORDER_ID'] ?? '' }}</a></h5>
                                        </td>
                                        <td>
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-dark">{{ $order['TXN_AMOUNT'] ?? '' }}</a></h5>
                                        </td>
                                        <td>
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-dark">{{ $order['name'] ?? '' }}</a></h5>
                                        </td>
                                        <td>
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-dark">{{ $order['email'] ?? '' }}</a></h5>
                                        </td>
                                        <td>
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-dark">{{ $order['mobile'] ?? '' }}</a></h5>
                                        </td>
                                        <td>
                                            <h5 class=" badge badge-pill badge-soft-success font-size-14 mb-1"
                                                style=" background-color: @php echo $order['paymentstatus']=='TXN_SUCCESS'?'#34c38f':'coral'@endphp ;">
                                                <a href="#" class="text-light"> @php echo $order['paymentstatus']=='TXN_SUCCESS'?'success':'failure'@endphp</a>
                                            </h5>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                        <div class="d-flex justify-content-center">
                            {!! $allOrders->withQueryString()->links() !!}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/dropdowns.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#add-button').on('click', function(e) {
                window.location.href = 'add-surveyor';
            });

            $('.surveyor_switch').on('change', function() {
                var surveyor_status = $(this).is(':checked');
                var surveyor_id = $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: 'surveyor-status',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "surveyor_status": surveyor_status,
                        "surveyor_id": surveyor_id,
                    },
                    success: function(result) {
                        console.log(result);
                    }
                });
            });

        });
    </script>
@endsection
