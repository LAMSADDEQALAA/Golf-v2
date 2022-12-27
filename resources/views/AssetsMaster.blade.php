@section("assets/css")
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}" />
@endsection

@section("datatable/css")
    <link rel="stylesheet" type="text/css"
    href="{{ asset('assets/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css"
    href="{{ asset('assets/datatables.net-bs4/css/responsive.dataTables.min.css') }}">
@endsection

@section("datatable/js")
    <script src="{{ asset('assets/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
    <script>
        $(function () {
            $('#myTable').DataTable();
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function (settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function (group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
            // responsive table
            $('#config-table').DataTable({
                responsive: true
            });
            $('#example23').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary me-1');
        });

    </script>
@endsection

@section("extraDatatableActions")
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
@endsection

@section("login/css")
  <link rel="stylesheet" href="{{ asset('assets/css/pages/login-register-lock.css') }}" />
@endsection

@section("form/js")
<script src="{{ asset('assets/js/pages/jasny-bootstrap.js') }}" ></script>
@endsection
@section('form/css')
<link href="{{ asset('assets/css/pages/floating-label.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/pages/file-upload.css') }}" rel="stylesheet">
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
@endsection

