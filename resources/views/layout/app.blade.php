@include("LayoutsMaster")
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->

    <title>@yield('title') - GOLF</title>
    @include('AssetsMaster')
    @yield("assets/css")
    @yield("content.css")
    </head>

<body class="skin-default fixed-header">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
   @yield("PreLoader")
    <div id="main-wrapper">
        @yield("header")
        @yield("SideBar")
        <div class="page-wrapper">
            <div class="container-fluid">

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">@yield('title')</h4>
                    </div>

                    @isset($name)
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <a href="{{ route("$name.create") }}" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i
                                class="fa fa-plus-circle"></i>Create New</a>
                            </div>
                        </div>
                    @endisset
                </div>



                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @yield("content")
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->



                @yield("ServicePanel")
            </div>
        </div>
        @yield("footer")
    </div>
    @yield('assets/js')
    @yield("content.js")
</body>

</html>
