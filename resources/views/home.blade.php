@include("LayoutsMaster")
@section('title','Home')
@yield("head")
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
                        <h4 class="text-themecolor">DashBoard</h4>
                    </div>
                </div>



                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                This is some text within a card block.
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
</body>

</html>
