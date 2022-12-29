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
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#</td>
                        <td>Email</td>
                        <td>Roles</td>
                        <td>
                    <div class="d-inline-block">
                        <a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end m-0">
                        <li><a href="javascript:;"
                            class="dropdown-item"
                            data-bs-toggle="modal"
                            data-bs-target="#modalCenter"
                            >Edit Roles</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li>
                        </ul>
                        </div>
                        <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Email</td>
                        <td>Roles</td>
                        <td>
                    <div class="d-inline-block">
                        <a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end m-0">
                        <li><a href="javascript:;" class="dropdown-item">Edit Roles</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li>
                        </ul>
                        </div>
                        <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Email</td>
                        <td>Roles</td>
                        <td>
                    <div class="d-inline-block">
                        <a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end m-0">
                        <li><a href="javascript:;" class="dropdown-item">Edit Roles</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li>
                        </ul>
                        </div>
                        <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Email</td>
                        <td>Roles</td>
                        <td>
                    <div class="d-inline-block">
                        <a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end m-0">
                        <li><a href="javascript:;" class="dropdown-item">Edit Roles</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li>
                        </ul>
                        </div>
                        <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Roles</th>
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
                <label class="form-label" for="basicPost">Post</label>
                <div class="input-group input-group-merge">
                <span id="basicPost2" class="input-group-text"><i class="ti ti-briefcase"></i></span>
                <input
                    type="text"
                    id="basicPost"
                    name="basicPost"
                    class="form-control dt-post"
                    placeholder="Web Developer"
                    aria-label="Web Developer"
                    aria-describedby="basicPost2"
                />
                </div>
            </div>
            <div class="col-sm-12">
                <label class="form-label" for="basicEmail">Email</label>
                <div class="input-group input-group-merge">
                <span class="input-group-text"><i class="ti ti-mail"></i></span>
                <input
                    type="text"
                    id="basicEmail"
                    name="basicEmail"
                    class="form-control dt-email"
                    placeholder="john.doe@example.com"
                    aria-label="john.doe@example.com"
                />
                </div>
                <div class="form-text">You can use letters, numbers & periods</div>
            </div>
            <div class="col-sm-12">
                <label class="form-label" for="basicDate">Joining Date</label>
                <div class="input-group input-group-merge">
                <span id="basicDate2" class="input-group-text"><i class="ti ti-calendar"></i></span>
                <input
                    type="text"
                    class="form-control dt-date"
                    id="basicDate"
                    name="basicDate"
                    aria-describedby="basicDate2"
                    placeholder="MM/DD/YYYY"
                    aria-label="MM/DD/YYYY"
                />
                </div>
            </div>
            <div class="col-sm-12">
                <label class="form-label" for="basicSalary">Salary</label>
                <div class="input-group input-group-merge">
                <span id="basicSalary2" class="input-group-text"><i class="ti ti-currency-dollar"></i></span>
                <input
                    type="number"
                    id="basicSalary"
                    name="basicSalary"
                    class="form-control dt-salary"
                    placeholder="12000"
                    aria-label="12000"
                    aria-describedby="basicSalary2"
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
    <!-- Edit Model -->

    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle">User roles edit</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col mb-3">
                    <label for="exampleFormControlReadOnlyInput1" class="form-label">user Email</label>
                    <input
                      class="form-control"
                      type="text"
                      id="exampleFormControlReadOnlyInput1"
                      placeholder="Readonly input here..."
                      readonly
                    />
                </div>
              </div>
              <div class="row g-2">
                <div class="col-12 mb-4">
                    <label for="select2Primary" class="form-label">Roles</label>
                    <div class="select2-primary">
                      <select id="select2Primary" class="select2 form-select" multiple>
                        <option value="1" selected>Option1</option>
                        <option value="2" selected>Option2</option>
                        <option value="3">Option3</option>
                        <option value="4">Option4</option>
                      </select>
                    </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
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
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
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
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>

    <script src="{{ asset('assets/js/tables-datatables-basic.js') }}"></script>
    <script src="{{ asset('assets/js/forms-selects.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/ui-modals.js') }}"></script> --}}
@endsection
