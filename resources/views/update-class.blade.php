@extends('layouts.master')

@section('title')
    Edit Class Page
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
                    Edit Class
                @endslot
                @slot('title')
                    Edit Class
                @endslot
            @endcomponent
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ url('class/update') }}" method="POST">
                        @csrf
                        <div class="mb-3 d-flex">
                            <label for="class_name" class="col-md-2 col-form-label">Class Name</label>
                            <div class="col-md-8">
                                <input type="hidden" name='class_id' value="{{ $class->class_id }}">
                                <input class="form-control" type="text" name="class_name" id="class_name"
                                    autocomplete="off" value="{{ $class->class_name }}">
                                <div class='badge badge-danger text-danger'>
                                    @error('class_name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 d-flex">
                            <label for="class_price" class="col-md-2 col-form-label">Class Price</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="class_price" id="class_price"
                                    autocomplete="off" value="{{ $class->class_price }}">
                                <div class='badge badge-danger text-danger'>
                                    @error('class_price')
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
