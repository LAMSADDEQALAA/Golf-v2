@include("AssetsMaster")
<!DOCTYPE html>
<html
  lang="{{ str_replace('_', '-', app()->getLocale()) }}"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/') }}"
  data-template="horizontal-menu-template"
>
  <head>
      <meta charset="utf-8" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Golf - @yield("section") - @yield("title")</title>

    <meta name="description" content="" />

    @yield("assets.css")
    @yield("page.css")
    <!-- Page CSS -->

    <!-- Helpers -->
    @yield("helpers")
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
      <div class="layout-container">
        <!-- Navbar -->

        @include("component.Navbar")

        <!-- / Navbar -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Menu -->
            @include("component.Menu")
            <!-- / Menu -->

            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">@yield("section") /</span> @yield("title")</h4>

                @if(Session::has("message"))
                  <div class="alert alert-{{ Session::get("message_type") }} d-flex align-items-center" role="alert">
                    <span class="alert-icon text-{{ Session::get("message_type") }} me-2">
                        @if(Session::get("message_type") == "success")
                        <i class="ti ti-check ti-xs"></i>
                        @else
                        <i class="ti ti-ban ti-xs"></i>
                        @endif
                    </span>
                    {{ Session::get("message") }}
                   </div>
                @endif
                @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                            <span class="alert-icon text-warning me-2">
                                <i class="ti ti-bell ti-xs"></i>
                            </span>
                                {{ $error }}
                             </div>
                        @endforeach
                @endif
            @yield("content")
            </div>
            <!--/ Content -->

            <!-- Footer -->
            @include("component.Footer")
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!--/ Content wrapper -->
        </div>

        <!--/ Layout container -->
      </div>
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>

    <!--/ Layout wrapper -->

    <!-- Core JS -->
    @yield("assets.js")
    @yield("page.js")

  </body>
</html>
