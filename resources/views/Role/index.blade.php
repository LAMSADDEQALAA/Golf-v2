@extends("layout.app")
@section('title','Roles')


@section("content")
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">DataTables /</span> Basic</h4>
    <!-- DataTable with Buttons -->
    <div class="card">
    <div class="card-datatable table-responsive pt-0">
        <table class="datatables-basic table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Role</th>
                        <th>Permissions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="id">1</td>
                        <td class="Role">hello</td>
                        <td class="Permissions">
                            <span class="badge bg-label-primary me-1">Perm</span>
                            <span class="badge bg-label-primary me-1">Perm</span>
                            <span class="badge bg-label-primary me-1">Perm</span>
                            <span class="badge bg-label-primary me-1">Perm</span>

                        </td>
                        <td>
                    <div class="d-inline-block">
                        <a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end m-0">
                        <li><a href="javascript:;" class="dropdown-item"
                            data-bs-toggle="modal"
                            data-bs-target="#Edit-perm-modal"
                            id="Edit-Perm"
                            >Edit Permissions</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li>
                        </ul>
                        </div>
                        <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil" data-bs-toggle="modal"
                            data-bs-target="#Edit-modal"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Role</td>
                        <td>
                            <span class="badge bg-label-primary me-1">Perm</span>
                            <span class="badge bg-label-primary me-1">Perm</span>
                            <span class="badge bg-label-primary me-1">Perm</span>
                            <span class="badge bg-label-primary me-1">Perm</span>
                            <span class="badge bg-label-primary me-1">Perm</span>
                        </td>
                        <td>
                    <div class="d-inline-block">
                        <a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end m-0">
                        <li><a href="javascript:;" class="dropdown-item">Edit Permissions</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li>
                        </ul>
                        </div>
                        <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Role</td>
                        <td>
                            <span class="badge bg-label-primary me-1">Perm</span>
                            <span class="badge bg-label-primary me-1">Perm</span>
                            <span class="badge bg-label-primary me-1">Perm</span>
                            <span class="badge bg-label-primary me-1">Perm</span>
                            <span class="badge bg-label-primary me-1">Perm</span>
                            <span class="badge bg-label-primary me-1">Perm</span>
                            <span class="badge bg-label-primary me-1">Perm</span>
                            <span class="badge bg-label-primary me-1">Perm</span>
                            <span class="badge bg-label-primary me-1">Perm</span>
                            <span class="badge bg-label-primary me-1">Perm</span>
                            <span class="badge bg-label-primary me-1">Perm</span>
                            <span class="badge bg-label-primary me-1">Perm</span>

                        </td>
                        <td>
                    <div class="d-inline-block">
                        <a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end m-0">
                        <li><a href="javascript:;" class="dropdown-item">Edit Permissions</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li>
                        </ul>
                        </div>
                        <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Role</td>
                        <td></td>
                        <td>
                    <div class="d-inline-block">
                        <a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end m-0">
                        <li><a href="javascript:;" class="dropdown-item">Edit Permissions</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a href="javascript:;" class="dropdown-item text-danger delete-record">Delete</a></li>
                        </ul>
                        </div>
                        <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>
                        </td>
                    </tr>
                </tbody>
        </table>
    </div>
    </div>
    <!-- edit Perms modal -->
    <div class="modal fade" id="Edit-perm-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle">Role permissions edit</h5>
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
                    <input type="hidden" id="id-edit-perm" name="id">
                    <label for="role-edit-perm" class="form-label">Role</label>
                    <input
                      class="form-control"
                      type="text"
                      id="role-edit-perm"
                      placeholder="Readonly input here..."
                      readonly
                    />
                </div>
              </div>
              <div class="row g-2">
                <div class="col-12 mb-4">
                    <label for="Permission-edit-perm" class="form-label">Permissions</label>
                    <select id="Permission-edit-perm" class="select2 form-select" multiple>
                      <optgroup label="Alaskan/Hawaiian Time Zone">
                        <option value="AK">Alaska</option>
                        <option value="HI">Hawaii</option>
                      </optgroup>
                      <optgroup label="Pacific Time Zone">
                        <option value="CA" >California</option>
                        <option value="NV">Nevada</option>
                        <option value="OR" >Oregon</option>
                        <option value="WA">Washington</option>
                      </optgroup>
                      <optgroup label="Mountain Time Zone">
                        <option value="AZ" >Arizona</option>
                        <option value="CO" >Colorado</option>
                        <option value="ID">Idaho</option>
                        <option value="MT">Montana</option>
                        <option value="NE" >Nebraska</option>
                        <option value="NM">New Mexico</option>
                        <option value="ND" >North Dakota</option>
                        <option value="UT">Utah</option>
                        <option value="WY">Wyoming</option>
                      </optgroup>
                      <optgroup label="Central Time Zone">
                        <option value="AL">Alabama</option>
                        <option value="AR" >Arkansas</option>
                        <option value="IL">Illinois</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA" >Louisiana</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="OK">Oklahoma</option>
                        <option value="SD">South Dakota</option>
                        <option value="TX" >Texas</option>
                        <option value="TN">Tennessee</option>
                        <option value="WI">Wisconsin</option>
                      </optgroup>
                      <optgroup label="Eastern Time Zone">
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="FL" >Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="IN">Indiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI" >Michigan</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="OH">Ohio</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WV">West Virginia</option>
                      </optgroup>
                    </select>
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
    <!-- edit role modal-->
    <div class="modal fade" id="Edit-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle">Role edit form</h5>
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
                    <label for="exampleFormControlReadOnlyInput1" class="form-label">Role</label>
                    <input
                      class="form-control"
                      type="text"
                      name="role"
                      id="exampleFormControlReadOnlyInput1"
                      placeholder="Enter Role name..."
                      value="Role"
                    />
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
    <!-- Create modal -->
    <div class="modal fade" id="add-modal"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCenterTitle">Role Add Form</h5>
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
                    <label for="Role-Add" class="form-label">Role</label>
                    <input
                      type="text"
                      name="role"
                      id="Role-Add"
                      class="form-control"
                      placeholder="Enter Name"
                    />
                  </div>
              </div>
              <div class="row g-2">
                <div class="col-12 mb-4">
                    <label for="Permissions-Add" class="form-label">Permissions</label>
                    <select id="Permissions-Add" class="select2 form-select" multiple>
                      <optgroup label="Alaskan/Hawaiian Time Zone">
                        <option value="AK">Alaska</option>
                        <option value="HI">Hawaii</option>
                      </optgroup>
                      <optgroup label="Pacific Time Zone">
                        <option value="CA">California</option>
                        <option value="NV">Nevada</option>
                        <option value="OR">Oregon</option>
                        <option value="WA">Washington</option>
                      </optgroup>
                      <optgroup label="Mountain Time Zone">
                        <option value="AZ">Arizona</option>
                        <option value="CO" >Colorado</option>
                        <option value="ID">Idaho</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NM">New Mexico</option>
                        <option value="ND">North Dakota</option>
                        <option value="UT">Utah</option>
                        <option value="WY">Wyoming</option>
                      </optgroup>
                      <optgroup label="Central Time Zone">
                        <option value="AL">Alabama</option>
                        <option value="AR">Arkansas</option>
                        <option value="IL">Illinois</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="OK">Oklahoma</option>
                        <option value="SD">South Dakota</option>
                        <option value="TX">Texas</option>
                        <option value="TN">Tennessee</option>
                        <option value="WI">Wisconsin</option>
                      </optgroup>
                      <optgroup label="Eastern Time Zone">
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="FL" >Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="IN">Indiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="OH">Ohio</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WV">West Virginia</option>
                      </optgroup>
                    </select>
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
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>

    <script src="{{ asset('assets/js/tables-datatables-basic.js') }}"></script>
    <script src="{{ asset('assets/js/forms-selects.js') }}"></script>


    <script>
    //    document.querySelector(".ti-pencil").addEventListener("click",(e)=>{
    //     const row =e.target.parentElement.parentElement.parentElement;
    //     console.log(row);
    //    })

    $(document).on("click","#Edit-Perm",(e)=>{
        var Target= $(e.target).parents('tr');

        $("#id-edit-perm").val(Target.find(".id").text());
        $("#role-edit-perm").val(Target.find(".Role").text());
        $("#Permission-edit-perm").val(['CA', 'OR', 'NE', 'ND']);

        console.log($(".perm").text());


    });


    </script>
    {{-- <script src="{{ asset('assets/js/ui-modals.js') }}"></script> --}}
@endsection
