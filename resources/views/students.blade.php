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
