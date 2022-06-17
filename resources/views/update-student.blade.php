@extends('layouts.master')

@section('title')
    Edit Student Page
@endsection

@section('css')
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@endsection

@section('content')
    <div class="d-flex justify-content-between">
        <div style="padding-top: 10px!important;">
            @component('components.breadcrumb')
                @slot('li_1')
                    Edit Student
                @endslot
                @slot('title')
                    Edit Student
                @endslot
            @endcomponent
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ url('students/update') }}" method="POST">
                        @csrf
                        <div class="mb-3 d-flex">
                            <label for="student_name" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-8">
                                <input type="hidden" name='payment_id' value="{{ $student->payment_id }}">
                                <input class="form-control" type="text" name="name" id="student_name"
                                    autocomplete="off" value="{{ $student->name }}">
                                <div class='badge badge-danger text-danger'>
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 d-flex">
                            <label for="student_email" class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-8">
                                <input class="form-control" type="email" name="email" id="student_email"
                                    autocomplete="off" value="{{ $student->email }}">
                                <div class='badge badge-danger text-danger'>
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 d-flex">
                            <label for="student_mobile" class="col-md-2 col-form-label">Mobile</label>
                            <div class="col-md-8">
                                <input class="form-control" maxlength="10"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    type="text" name="mobile" id="student_mobile" autocomplete="off"
                                    placeholder="Enter Mobile Number" value="{{ $student->mobile }}">
                                <div class='badge badge-danger text-danger'>
                                    @error('mobile')
                                        {{ $message }}
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class=" d-flex" style="margin-bottom: 2.3rem;">
                            <label for="student_email" class="col-md-2 col-form-label">Change Password</label>
                            <div class="col-md-8">
                                <input class="form-control" type="password" name="password" id="student_password"
                                    autocomplete="off" placeholder="Add new password" value="{{ $student->password }}">
                            </div>
                        </div>

                        <div class="mb-3 d-flex">
                            <label for="select_class" class="col-md-2 col-form-label">Class</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="select_class" id="select_class"
                                    autocomplete="off" value="{{ $student->select_class }}">
                                <div class='badge badge-danger text-danger'>
                                    @error('select_class')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 d-flex">
                            <label for="select_board" class="col-md-2 col-form-label">Board</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="select_board" id="select_board"
                                    autocomplete="off" value="{{ $student->select_board }}">
                                <div class='badge badge-danger text-danger'>
                                    @error('select_board')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 d-flex">
                            <label for="school_name" class="col-md-2 col-form-label">School</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="school_name" id="school_name"
                                    autocomplete="off" value="{{ $student->school_name }}">
                                <div class='badge badge-danger text-danger'>
                                    @error('school_name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 d-flex">
                            <label for="city" class="col-md-2 col-form-label">City</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="city" id="city" autocomplete="off"
                                    placeholder="Enter Email " value="{{ $student->city }}">
                                <div class='badge badge-danger text-danger'>
                                    @error('city')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 d-flex">
                            <label class="col-md-2"></label>
                            <div class="col-md-8" style="text-align: end;">
                                <span id="submit_btn">
                                    <input class="btn btn-danger btn-sm add-question-submit-btn" value="Cancel"
                                        type="button" onclick="window.history.go(-1)">
                                </span>
                                <span id="submit_btn">
                                    <input class="btn btn-primary btn-sm add-question-submit-btn" id="savebtn"
                                        type="submit" value="Save">
                                </span>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
