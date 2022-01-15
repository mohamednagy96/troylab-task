<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {{-- <link rel="shortcut icon" href="{{ $setting['website_logo'] }}" type="image/x-icon"> --}}

    <link rel="stylesheet" href="{{ asset("dist/admin/plugins/fontawesome-free/css/all.min.css") }}">

    <link rel="stylesheet" href="{{ asset("dist/admin/plugins/select2/css/select2.min.css") }}">

    <link rel="stylesheet" href="{{ asset("dist/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css") }}">

    <link rel="stylesheet" href="{{ asset("dist/admin/plugins/summernote/summernote-bs4.css") }}">

    <link rel="stylesheet" href="{{ asset("dist/admin/css/adminlte.min.css") }}">

    <link rel="stylesheet" href="{{ asset("dist/admin/css/style.css") }}">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

@stack('extra-css')

</head>
