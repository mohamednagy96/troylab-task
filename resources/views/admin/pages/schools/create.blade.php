@extends('admin.layouts.master')
@section('content')

<x-card>
{!! Form::open(['route' => 'admin.schools.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

@include('admin.pages.schools.form')

{!! Form::close() !!}

</x-card>

@endsection
