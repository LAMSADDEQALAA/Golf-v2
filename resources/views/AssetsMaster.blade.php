@section("assets/css")
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section("login/css")
  <link rel="stylesheet" href="{{ asset('assets/css/pages/login-register-lock.css') }}" />
@endsection


@section("assets/js")
    <!-- build:js assets/vendor/js/core.js -->
    {{-- <script src="{{ asset("assets/jquery/bootstrap/dist/js/bootstrap.bundle.min.js") }}" ></script>
    <script src="{{ asset("assets/jquery/dist/jquery.min.js") }}" ></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets/js/perfect-scrollbar.jquery.min.js') }}" ></script>
    <!--Wave Effects -->
    <script src="{{ asset('assets/js/waves.js') }}" ></script>
    <!--stickey kit -->
    <script src="{{ asset('assets/sticky-kit-master/dist/sticky-kit.min.js') }}" ></script>
    <script src="{{ asset('assets/sparkline/jquery.sparkline.min.js') }}" ></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('assets/js/custom.min.js') }}" ></script>
    <script src="{{ asset('assets/jquery-sparkline/jquery.sparkline.min.js') }}" ></script>

    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
@endsection

