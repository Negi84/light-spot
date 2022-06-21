@extends('layouts.master')
@section('title')
    Students List
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

        <div class="status-btn">
            <div class="btn-group" style="">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <span class="analytics-all-btn dropdown-selection" data-main="class_name"
                        data-value="@php echo isset(request()->class_name)?request()->class_name :'select'@endphp">
                        @if (isset(request()->class_name))
                            {{ request()->class_name }}
                        @else
                            Select Class Name
                        @endif
                    </span>
                    <i class="mdi mdi-chevron-down"></i>
                </button>
                <div class="dropdown-menu status-id  dropdown-height-manage">
                    <a class="dropdown-item text-capitalize" href="#" data-type='class_name' data-value="all"
                        @if (request()->class_name == 'all') style="background: #c2cef5;" @endif>All Class</a>
                    @foreach ($standards as $standard)
                        <a class="dropdown-item text-capitalize" href="#" data-type='class_name'
                            data-value="{{ $standard->class_name }}"
                            @if (request()->class_name == '{{ $standard->class_name }}') style="background: #c2cef5;" @endif>{{ $standard->class_name }}</a>
                    @endforeach
                </div>
            </div>

            <div class="btn-group" style="">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <span class="analytics-all-btn dropdown-selection" data-main="board_name"
                        data-value="@php echo isset(request()->board_name)?request()->board_name :'select'@endphp">
                        @if (isset(request()->board_name))
                            {{ request()->board_name }}
                        @else
                            Select Board Name
                        @endif
                    </span>
                    <i class="mdi mdi-chevron-down"></i>
                </button>
                <div class="dropdown-menu status-id  dropdown-height-manage">
                    <a class="dropdown-item text-capitalize" href="#" data-type='board_name' data-value="all"
                        @if (request()->board_name == 'all') style="background: #c2cef5;" @endif>All Board</a>
                    @foreach ($boards as $board)
                        <a class="dropdown-item text-capitalize" href="#" data-type='board_name'
                            data-value="{{ $board->board_name }}"
                            @if (request()->board_name == '{{ $board->board_name }}') style="background: #c2cef5;" @endif>{{ $board->board_name }}</a>
                    @endforeach
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
                                    <th scope="col" style="width: 70px;">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">School Name</th>
                                    <th scope="col">Board</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($allStudents as $student)
                                    <tr>
                                        <td>
                                            <div class="avatar-xs">
                                                <span class="avatar-title rounded-circle">
                                                    {{ strtoupper($student['name']['0']) ?? '' }}
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-dark">{{ ucfirst($student['name']) ?? '' }}</a></h5>
                                        </td>
                                        <td>
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-dark">{{ $student['email'] ?? '' }}</a></h5>
                                        </td>
                                        <td>
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-dark">{{ $student['mobile'] ?? '' }}</a></h5>
                                        </td>
                                        <td>
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-dark">{{ $student['school_name'] ?? '' }}</a></h5>
                                        </td>
                                        <td>
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-dark">{{ $student['select_board'] ?? '' }}</a></h5>
                                        </td>
                                        <td>
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-dark">{{ $student['select_class'] ?? '' }}</a></h5>
                                        </td>
                                        <td>
                                            <h5 class="font-size-14 mb-1"><a href="#"
                                                    class="text-dark">{{ $student['city'] ?? '' }}</a></h5>
                                        </td>
                                        <td>
                                            <a href="{{ url('students/' . $student['payment_id']) }}"
                                                class="text-success">
                                                <i class="mdi mdi-pencil font-size-18" title="Edit Student"></i></a>
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
                            {!! $allStudents->withQueryString()->links() !!}
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
