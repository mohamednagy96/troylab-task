@extends('admin.layouts.master', ["breadcrumb" => "edit", "breadcrumbLinks" => "Admins"])
@section('content')
    <x-card title="Edit">
        {!! Form::model($admin, ['route' => ['admin.admin_users.update', $admin->id], 'method' => 'put','enctype'=>'multipart/form-data']) !!}
        @include('admin.pages.adminUsers.form')
        {!! Form::close() !!}
</x-card>
@endsection


