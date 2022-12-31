@extends("layout.app")
@section("section","Roles")
@section('title','Table')


@section("content")
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
                    @foreach ( $roles as $role )
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @foreach ($role->permissions as $permission)
                            <span class="badge bg-label-primary m-1">{{ $permission->name }}</span>
                            @endforeach

                        </td>
                        <td>
                        @hasrole("super-admin")
                            <div class="d-inline-block">
                            <a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end m-0">
                            <li><a href="javascript:;" class="dropdown-item"
                                data-url="{{ route('role.EditRolePerm',["role"=>$role->id]) }}"
                                data-bs-toggle="modal"
                                data-bs-target="#Edit-perm-modal"
                                id="Edit-perm"
                                >Edit Permissions</a></li>
                            <div class="dropdown-divider"></div>
                            <li>
                                <form action="{{ route("role.destroy",["role"=> $role->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="dropdown-item text-danger delete-record">Delete</button>
                                </form>
                            </li>
                            </ul>
                            </div>
                            <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil" data-url="{{ route('role.edit',["role"=>$role->id]) }}" id="Edit-role" data-bs-toggle="modal"
                                data-bs-target="#Edit-modal"></i>
                            </a>
                        @else
                           @if (auth()->user()->can("update-role-permissions") || auth()->user()->can("delete-role"))
                            <div class="d-inline-block">
                                <a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end m-0">
                                    @can("update-role-permissions")

                                    <li><a href="javascript:;" class="dropdown-item"
                                        data-url="{{ route('role.EditRolePerm',["role"=>$role->id]) }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#Edit-perm-modal"
                                        id="Edit-perm"
                                        >Edit Permissions</a></li>
                                    @endcan
                                <div class="dropdown-divider"></div>
                                @can("delete-role")
                                <li>
                                    <form action="{{ route("role.destroy",["role"=> $role->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item text-danger delete-record">Delete</button>
                                    </form>
                                </li>
                                @endcan
                                </ul>
                                </div>
                            @endif
                                @can("edit-role")
                                <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil" data-url="{{ route('role.edit',["role"=>$role->id]) }}" id="Edit-role" data-bs-toggle="modal"
                                    data-bs-target="#Edit-modal"></i>
                                </a>
                                @endcan
                        @endhasrole
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
    </div>
    <!-- edit Perms modal -->
    @hasrole("super-admin")
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
            <form action="{{ route('role.UpdateRolePerm') }}" method="POST">
                @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col mb-3">
                    <input type="hidden" id="id-edit-perm" name="id">
                    <label for="role-edit-perm" class="form-label">Role</label>
                    <input
                      class="form-control"
                      type="text"
                      id="role-edit-perm"
                      placeholder="Readonly input"
                      readonly
                    />
                </div>
              </div>
              <div class="row g-2">
                <div class="col-12 mb-4">
                    <label for="Permission-edit-perm" class="form-label">Permissions</label>
                    <select id="Permission-edit-perm" name="perms[]" class="select2 form-select" multiple>
                        @foreach ( $perms as $key => $perm )
                        <optgroup label="{{ $key  }}">
                         @foreach ( $perm as $value )
                           <option value="{{ $value->name }}">{{ $value->name  }}</option>
                         @endforeach
                        </optgroup>
                        @endforeach
                    </select>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
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
        <form id="edit-role" action="{{ route("role:update") }}" method="POST">
            @method('PUT')
            @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col mb-3">
                    <input type="hidden" name="id" id="e-id">
                    <label for="e_Role" class="form-label">Role</label>
                    <input
                      class="form-control"
                      type="text"
                      name="role"
                      id="e_Role"
                      placeholder="Enter Role name..."
                      value=""
                    />
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
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
            <form action="{{ route('role.store') }}" id="roleAdd" method="POST">
            @csrf
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
                    <select id="Permissions-Add" class="select2 form-select" name="permsissions[]" multiple>
                       @foreach ( $perms as $key => $perm )
                       <optgroup label="{{ $key  }}">
                        @foreach ( $perm as $value )
                          <option value="{{ $value->name }}">{{ $value->name  }}</option>
                        @endforeach
                       </optgroup>
                       @endforeach

                    </select>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
        </div>
    </div>
    @else
    @can("edit-role")
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
        <form id="edit-role" action="{{ route("role:update") }}" method="POST">
            @method('PUT')
            @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col mb-3">
                    <input type="hidden" name="id" id="e-id">
                    <label for="e_Role" class="form-label">Role</label>
                    <input
                      class="form-control"
                      type="text"
                      name="role"
                      id="e_Role"
                      placeholder="Enter Role name..."
                      value=""
                    />
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
          </div>
        </div>
    </div>
    @endcan
    @can("add-role")
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
            <form action="{{ route('role.store') }}" method="POST">
            @csrf
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
                    <select id="Permissions-Add" class="select2 form-select" name="permsissions[]" multiple>
                       @foreach ( $perms as $key => $perm )
                       <optgroup label="{{ $key  }}">
                        @foreach ( $perm as $value )
                          <option value="{{ $value->name }}">{{ $value->name  }}</option>
                        @endforeach
                       </optgroup>
                       @endforeach

                    </select>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
        </div>
    </div>
    @endcan
    @can("update-role-permissions")
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
            <form action="{{ route('role.UpdateRolePerm') }}" method="POST">
                @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col mb-3">
                    <input type="hidden" id="id-edit-perm" name="id">
                    <label for="role-edit-perm" class="form-label">Role</label>
                    <input
                      class="form-control"
                      type="text"
                      id="role-edit-perm"
                      placeholder="Readonly input"
                      readonly
                    />
                </div>
              </div>
              <div class="row g-2">
                <div class="col-12 mb-4">
                    <label for="Permission-edit-perm" class="form-label">Permissions</label>
                    <select id="Permission-edit-perm" name="perms[]" class="select2 form-select" multiple>
                        @foreach ( $perms as $key => $perm )
                        <optgroup label="{{ $key  }}">
                         @foreach ( $perm as $value )
                           <option value="{{ $value->name }}">{{ $value->name  }}</option>
                         @endforeach
                        </optgroup>
                        @endforeach
                    </select>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
          </div>
        </div>
    </div>
    @endcan

    @endhasrole
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

    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>

    <script src="{{ asset('assets/js/tables-datatables-basic.js') }}"></script>
    <script src="{{ asset('assets/js/forms-selects.js') }}"></script>


    <script>

    $(document).on("click","#Edit-perm",async (e) => {
         EditModalSetGetValues(e,"#role-edit-perm","#id-edit-perm");
    });
    $(document).on("click","#Edit-role",async (e)=>EditModalSetGetValues(e,"#e_Role","#e-id"));

    async function EditModalSetGetValues(e,InputTarget,id){
            let url= $(e.target).data("url");
            try {
            let response = await fetch(url,{
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'GET',
            });
            let data = await response.json();
            if(data?.permissions){
                let i =0;
                const perms = data.permissions.map(perm => {
                    return perm.name
                })
                $('#Permission-edit-perm').val(perms);
            }

            $(InputTarget).val(data.name);
            $(id).val(data.id)
            } catch (error) {
                console.log(error);
            }
    }
    </script>
    {{-- <script src="{{ asset('assets/js/ui-modals.js') }}"></script> --}}
   {{-- form validation  --}}
    <script>
        const formAdd = document.querySelector("#roleAdd");
        const formEdit = document.querySelector("#edit-role");
       (function () {
                if (formAdd) {
                    const fv = FormValidation.formValidation(formAdd, {
                        fields: {
                            role: {
                                validators: {
                                    notEmpty: {
                                        message: "Please enter a role name",
                                    },

                                },
                            },

                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap5: new FormValidation.plugins.Bootstrap5({
                                eleValidClass: "",
                                rowSelector: ".mb-3",
                            }),
                            submitButton: new FormValidation.plugins.SubmitButton(),

                            defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                            autoFocus: new FormValidation.plugins.AutoFocus(),
                        },
                        init: (instance) => {
                            instance.on("plugins.message.placed", function (e) {
                                if (
                                    e.element.parentElement.classList.contains(
                                        "input-group"
                                    )
                                ) {
                                    e.element.parentElement.insertAdjacentElement(
                                        "afterend",
                                        e.messageElement
                                    );
                                }
                            });
                        },
                    });
                }
       })();
       (function () {
                if (formEdit) {
                    const fv = FormValidation.formValidation(formEdit, {
                        fields: {
                            role: {
                                validators: {
                                    notEmpty: {
                                        message: "Please enter a role name",
                                    },

                                },
                            },

                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap5: new FormValidation.plugins.Bootstrap5({
                                eleValidClass: "",
                                rowSelector: ".mb-3",
                            }),
                            submitButton: new FormValidation.plugins.SubmitButton(),

                            defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                            autoFocus: new FormValidation.plugins.AutoFocus(),
                        },
                        init: (instance) => {
                            instance.on("plugins.message.placed", function (e) {
                                if (
                                    e.element.parentElement.classList.contains(
                                        "input-group"
                                    )
                                ) {
                                    e.element.parentElement.insertAdjacentElement(
                                        "afterend",
                                        e.messageElement
                                    );
                                }
                            });
                        },
                    });
                }
        })();

    </script>
@endsection
