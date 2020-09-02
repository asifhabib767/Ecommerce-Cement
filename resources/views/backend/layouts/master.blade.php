<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('backend.layouts.partials.meta_tags')
    <title>@yield('title', config('app.name'))</title>
    @include('backend.layouts.partials.styles')
    @yield('styles')
</head>

<body>
    <div id="app">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        @include('backend.layouts.partials.preloader')
        
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            @include('backend.layouts.partials.header')
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            @include('backend.layouts.partials.sidebar')
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                

                @yield('admin-content')

                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                @include('backend.layouts.partials.footer')
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->

            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
        
        @include('backend.layouts.partials.theme-options')
        <div class="chat-windows"></div>
    
    </div>
    @include('backend.layouts.partials.scripts')
    @yield('scripts')
</body>
</html>