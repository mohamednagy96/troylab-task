@extends('admin.layouts.master')
@section('content')
<x-card>
{!! Form::model($school, ['route' => ['admin.schools.update', $school->id], 'method' => 'put','enctype'=>'multipart/form-data']) !!}
    @include('admin.pages.schools.form')
{!! Form::close() !!}

</x-card>
@endsection
