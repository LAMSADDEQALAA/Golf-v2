@extends("layout.app")
@section('title','Terrain De Golf DataTable')


@section("content")
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">DataTables /</span> Basic</h4>
    <!-- DataTable with Buttons -->
    <div class="card">
    <div class="card-datatable table-responsive pt-0">
        <table class="datatables-basic table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom De Ville</th>
                        <th>Numero des Terrain Golf</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#</td>
                        <td>Nom De Ville</td>
                        <td>Numero des Terrain Golf</td>
                        <td>
                        <div class="d-inline-block">
                            <a href="javascript:;" class="btn btn-sm btn-icon delete-record"><i class="text-primary ti ti-trash"></i></a>
                            <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>
                        </div>
                        </td>

                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Nom De Ville</td>
                        <td>Numero des Terrain Golf</td>
                        <td>
                            <div class="d-inline-block">
                                <a href="javascript:;" class="btn btn-sm btn-icon delete-record"><i class="text-primary ti ti-trash"></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Nom De Ville</td>
                        <td>Numero des Terrain Golf</td>
                        <td>
                            <div class="d-inline-block">
                                <a href="javascript:;" class="btn btn-sm btn-icon delete-record"><i class="text-primary ti ti-trash"></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Nom De Ville</td>
                        <td>Numero des Terrain Golf</td>
                        <td>
                            <div class="d-inline-block">
                                <a href="javascript:;" class="btn btn-sm btn-icon delete-record"><i class="text-primary ti ti-trash"></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nom De Ville</th>
                        <th>Numero des Terrain Golf</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
        </table>
    </div>
    </div>
    <!-- Modal to add new record -->
    <div class="offcanvas offcanvas-end" id="add-new-record">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
        <button
        type="button"
        class="btn-close text-reset"
        data-bs-dismiss="offcanvas"
        aria-label="Close"
        ></button>
    </div>
    <div class="offcanvas-body flex-grow-1">
        <form class="add-new-record pt-0 row g-2" id="form-add-new-record" onsubmit="return false">
        <div class="col-sm-12">
            <label class="form-label" for="basicFullname">Full Name</label>
            <div class="input-group input-group-merge">
            <span id="basicFullname2" class="input-group-text"><i class="ti ti-user"></i></span>
            <input
                type="text"
                id="basicFullname"
                class="form-control dt-full-name"
                name="basicFullname"
                placeholder="John Doe"
                aria-label="John Doe"
                aria-describedby="basicFullname2"
            />
            </div>
        </div>

        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Submit</button>
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        </div>
        </form>
    </div>
    </div>

    <!--/ DataTable with Buttons -->
@endsection

@section("page.css")
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
@endsection



@section("page.js")
    <script src="{{ asset('assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-buttons/datatables-buttons.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/jszip/jszip.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/pdfmake/pdfmake.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-buttons/buttons.html5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-buttons/buttons.print.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script> --}}

    <script src="{{ asset('assets/vendor/libs/datatables-rowgroup/datatables.rowgroup.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>

    <script src="{{ asset('assets/js/tables-datatables-basic.js') }}"></script>
@endsection
