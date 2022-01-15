@extends('admin.layouts.master', ['breadcrumb' => 'home'])

@section('content')

    <div class="row">
        <div class="col-6">
            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3>{{ $students }}</h3>
                    <p>Number Of Students</p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="small-box bg-gradient-danger">
                <div class="inner">
                    <h3>{{ $schools }}</h3>
                    <p>Number Of schools</p>
                </div>
            </div>
        </div>
    </div>
@endsection
