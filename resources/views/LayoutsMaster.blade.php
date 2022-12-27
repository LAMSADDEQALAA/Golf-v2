@section("header")
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-header">
                <i class="navbar-brand"><b></b></i>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse">

                <ul class="navbar-nav me-auto">
                    <!-- This is  -->
                    <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                </ul>
                <ul class="navbar-nav my-lg-0">
                    <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                </ul>
            </div>
        </nav>
    </header>
@endsection

@section("SideBar")
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar" style="position: fixed;">
            <!-- User Profile-->
            <div class="user-profile">
                <div class="user-pro-body">
                    <div><img src="{{ asset('assets/2076961.png') }}" alt="user-img" class="img-circle"></div>
                    <div class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>
                        <div class="dropdown-menu animated flipInY">
                            <!-- text-->
                            <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav" style="height: 85%;">
                <ul id="sidebarnav">
                    <li>
                        <a class="waves-effect waves-dark" href="{{ route('home') }}" ><i class="fa fa-tasks"></i><span class="hide-menu">DashBoard</span></a>
                        </li>
                    <li class="nav-small-cap" style="margin-left: 10px;">Data Tables</li>
                    <li>
                    <a class="waves-effect waves-dark" href="{{ route('terraingolf.index') }}" ><i class="fa fa-table"></i><span class="hide-menu">Golf Fields</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="{{ route('image.index') }}"><i class="fa fa-table"></i><span class="hide-menu">Golf Fields Images</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="{{ route('video.index') }}"><i class="fa fa-table"></i><span class="hide-menu">Golf Fields Video</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="{{ route('ville.index') }}"><i class="fa fa-table"></i><span class="hide-menu">Cities</span></a>
                    </li>
                    <li class="nav-small-cap" style="margin-left: 10px;">Users management</li>

                    <li> <a class="waves-effect waves-dark" href="{{ route('user.index') }}"><i class="fa fa-users"></i><span class="hide-menu">Users</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="{{ route('role.index') }}"><i class="fas fa-user-tag"></i><span class="hide-menu">Roles</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="{{ route('logout') }}"><i class="fas fa-power-off text-success"></i><span class="hide-menu">Log Out</span></a></li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
@endsection

@section("footer")
    <footer class="footer">
        © 2021 Eliteadmin by themedesigner.in
        <a href="https://www.wrappixel.com/">WrapPixel</a>
    </footer>
@endsection

@section("ServicePanel")
    <div class="right-sidebar">
        <div class="slimscrollright">
            <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
            <div class="r-panel-body">
                <ul id="themecolors" class="m-t-20">
                    <li><b>With Light sidebar</b></li>
                    <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme working">1</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme">4</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                    <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                    <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                    <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection


@section("PreLoader")
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Loading...</p>
        </div>
    </div>
@endsection
