<!DOCTYPE html>
<html>

@include('admin.includes.head')


<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        @include('admin.includes.header')

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        @include('admin.includes.sidebar')

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">


            <!-- Main content -->
            <div class="content">

                <x-alerts></x-alerts>
<br>
                @yield('content')

            </div>
            <!-- /.content -->
        </div>

        <!-- /.content-wrapper -->

        @include('admin.includes.footer')
    </div>
    <!-- ./wrapper -->
    <script src="{{ asset("dist/admin/plugins/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("dist/admin/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("dist/admin/plugins/select2/js/select2.full.min.js") }}"></script>
    <script src="{{ asset("dist/admin/js/adminlte.min.js") }}"></script>
    <script src="{{ asset("dist/admin/plugins/summernote/summernote-bs4.min.js") }}"></script>
    <script src="{{ asset("dist/admin/js/main.js") }}"></script>
    <script src="{{ mix("dist/admin/js/vue/main.js") }}"></script>
    @stack('extra-js')
</body>

</html>
