@extends('admin.layouts.master')
@section('content')

<x-card>
{!! Form::open(['route' => 'admin.students.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

@include('admin.pages.students.form')

{!! Form::close() !!}

</x-card>

@endsection
