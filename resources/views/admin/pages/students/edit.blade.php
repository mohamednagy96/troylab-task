@extends('admin.layouts.master')
@section('content')
<x-card>
{!! Form::model($student, ['route' => ['admin.students.update', $student->id], 'method' => 'put','enctype'=>'multipart/form-data']) !!}
    @include('admin.pages.students.form')
{!! Form::close() !!}

</x-card>
@endsection
