
@extends('admin.layouts.master', ["breadcrumb" => "create", "breadcrumbLinks" => "Admins"])
@section('content')
<x-card title="Create">
        {!! Form::open(['route' => 'admin.admin_users.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        @include('admin.pages.adminUsers.form')
        {!! Form::close() !!}
 </x-card>
@endsection


