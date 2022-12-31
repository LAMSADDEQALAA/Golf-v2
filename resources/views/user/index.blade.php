@extends("layout.app")
@section('title','Users')


@section("content")
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
                    @foreach ( $users as $user )
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach ( $user->roles as $role )
                            <span class="badge bg-label-primary me-1">{{ $role->name }}</span>
                            @endforeach

                        </td>
                        <td>
                        @hasrole("super-admin")
                                <div class="d-inline-block">
                                    <a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end m-0">
                                    <li><a href="javascript:;"
                                        data-url="{{ route('user.EditUserRoles',["user"=>$user->id]) }}"
                                        class="dropdown-item"
                                        data-bs-toggle="modal"
                                        id="Edit-user-roles"
                                        data-bs-target="#Edit-Role-modal"
                                        >Edit Roles</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li>
                                        <form action="{{ route("user.destroy",["user"=> $user->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item text-danger delete-record">Delete</button>
                                        </form>
                                    </li>
                                    </ul>
                                    </div>
                                    <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i id="Edit-user" class="text-primary ti ti-pencil" data-url="{{ route('user.edit',["user"=>$user->id]) }}" data-bs-toggle="modal"
                                        data-bs-target="#Edit-modal"></i></a>

                        @else
                           @if (auth()->user()->can("assign-user-roles") || auth()->user()->can("delete-user") )
                            <div class="d-inline-block">
                            <a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end m-0">
                            @can("assign-user-roles")
                            <li>
                                <a href="javascript:;"
                                data-url="{{ route('user.EditUserRoles',["user"=>$user->id]) }}"
                                class="dropdown-item"
                                data-bs-toggle="modal"
                                id="Edit-user-roles"
                                data-bs-target="#Edit-Role-modal"
                                >Edit Roles</a></li>
                            @endcan
                            @can("delete-user")
                                <li>
                                    <form action="{{ route("user.destroy",["user"=> $user->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item text-danger delete-record">Delete</button>
                                    </form>
                                </li>
                            @endcan
                            <div class="dropdown-divider"></div>
                            </ul>
                            </div>
                            @endif
                            @can("edit-user")
                            <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i id="Edit-user" class="text-primary ti ti-pencil" data-url="{{ route('user.edit',["user"=>$user->id]) }}" data-bs-toggle="modal"
                                data-bs-target="#Edit-modal"></i></a>
                            @endcan
                        @endhasrole
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
    </div>
    @hasrole("super-admin")
        <!-- Edit Roles Model -->
        <div class="modal fade" id="Edit-Role-modal" tabindex="-1" aria-hidden="true">
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
                <form action="{{ route('user.UpdateUserRoles') }}" method="POST">
                    @csrf
                <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="user-edit-role" class="form-label">user Email</label>
                        <input type="hidden" name="id" id="id-edit-user-role">
                        <input
                        class="form-control"
                        type="text"
                        id="user-edit-role"
                        placeholder="Readonly input here..."
                        readonly
                        />
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-12 mb-4">
                        <label for="role-edit-role" class="form-label">Roles</label>
                        <div class="select2-primary">
                        <select id="role-edit-role" name="roles[]" class="select2 form-select" multiple>
                            @foreach ( $roles as $role )
                            <option value="{{ $role->name }}" >{{ $role->name }}</option>
                            @endforeach
                        </select>
                        </div>
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

        <!-- Edit User Model -->
        <div class="modal fade" id="Edit-modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">User edit form</h5>
                    <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                    ></button>
                </div>
                <form id="edit-user" action="{{ route("user:update") }}" method="POST">
                    @method('PUT')
                    @csrf
                <div class="modal-body">
                    <div class="row">
                    <div class="col mb-3">
                        <label for="exampleFormControlReadOnlyInput1" class="form-label">Email</label>
                        <input type="hidden" name="id" id="id-User-edit">
                        <input
                            class="form-control"
                            type="text"
                            name="email"
                            id="e_email"
                            placeholder="Enter Role name..."
                            value=""
                        />
                    </div>
                    </div>
                    <div class="row">
                    <div class="col mb-3">
                        <label for="exampleFormControlReadOnlyInput1" class="form-label">New Password</label>
                        <input
                            class="form-control"
                            type="text"
                            name="NewPassword"
                            id="NewPassword"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
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

        <!-- add modal -->
        <div class="modal fade" id="add-modal"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{ route("user.store") }}" id="formAdd" class="w-100" method="post">
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">User Add Form</h5>
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
                        <label for="email" class="form-label">User Email</label>
                        <input
                        type="text"
                        name="email"
                        id="email"
                        class="form-control"
                        placeholder="Enter Name"
                        />
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-12 mb-4">
                        <label for="select2PrimaryAdd" class="form-label">Roles</label>
                        <div class="select2-primary">
                        <select id="select2PrimaryAdd" name="roles[]" class="select2 form-select" multiple>
                            @foreach ( $roles as $role )
                            <option value="{{ $role->name }}" >{{ $role->name }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="Password" class="form-label">Password</label>
                        <input
                        type="password"
                        name="Password"
                        id="Password"
                        class="form-control"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input
                        type="password"
                        name="confirmPassword"
                        id="confirmPassword"
                        class="form-control"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
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
            </div>
            </form>
            </div>
        </div>
    @else
        @can("edit-user")
        <div class="modal fade" id="Edit-modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">User edit form</h5>
                    <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                    ></button>
                </div>
                <form id="edit-user" action="{{ route("user:update") }}" method="POST">
                    @method('PUT')
                    @csrf
                <div class="modal-body">
                    <div class="row">
                    <div class="col mb-3">
                        <label for="exampleFormControlReadOnlyInput1" class="form-label">Email</label>
                        <input type="hidden" name="id" id="id-User-edit">
                        <input
                            class="form-control"
                            type="text"
                            name="email"
                            id="e_email"
                            placeholder="Enter Role name..."
                            value=""
                        />
                    </div>
                    </div>
                    <div class="row">
                    <div class="col mb-3">
                        <label for="exampleFormControlReadOnlyInput1" class="form-label">New Password</label>
                        <input
                            class="form-control"
                            type="text"
                            name="NewPassword"
                            id="NewPassword"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
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
        @can("assign-user-role")
        <div class="modal fade" id="Edit-Role-modal" tabindex="-1" aria-hidden="true">
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
                <form action="{{ route('user.UpdateUserRoles') }}" method="POST">
                    @csrf
                <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="user-edit-role" class="form-label">user Email</label>
                        <input type="hidden" name="id" id="id-edit-user-role">
                        <input
                        class="form-control"
                        type="text"
                        id="user-edit-role"
                        placeholder="Readonly input here..."
                        readonly
                        />
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-12 mb-4">
                        <label for="role-edit-role" class="form-label">Roles</label>
                        <div class="select2-primary">
                        <select id="role-edit-role" name="roles[]" class="select2 form-select" multiple>
                            @foreach ( $roles as $role )
                            <option value="{{ $role->name }}" >{{ $role->name }}</option>
                            @endforeach
                        </select>
                        </div>
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
        @can("add-user")
        <div class="modal fade" id="add-modal"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{ route("user.store") }}" id="formAdd" class="w-100" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">User Add Form</h5>
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
                        <label for="email" class="form-label">User Email</label>
                        <input
                        type="text"
                        name="email"
                        id="email"
                        class="form-control"
                        placeholder="Enter Name"
                        />
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-12 mb-4">
                        <label for="select2PrimaryAdd" class="form-label">Roles</label>
                        <div class="select2-primary">
                        <select id="select2PrimaryAdd" name="roles[]" class="select2 form-select" multiple>
                            @foreach ( $roles as $role )
                            <option value="{{ $role->name }}" >{{ $role->name }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="Password" class="form-label">Password</label>
                        <input
                        type="password"
                        name="Password"
                        id="Password"
                        class="form-control"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input
                        type="password"
                        name="confirmPassword"
                        id="confirmPassword"
                        class="form-control"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
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
            </div>
            </form>
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

    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>

    <script src="{{ asset('assets/js/tables-datatables-basic.js') }}"></script>
    <script src="{{ asset('assets/js/forms-selects.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/ui-modals.js') }}"></script> --}}

    {{-- fetch data for edit form --}}
    <script>
    $(document).on("click","#Edit-user-roles",async (e) => EditModalSetGetValues(e,"#user-edit-role","#id-edit-user-role"));
    $(document).on("click","#Edit-user",async (e)=>EditModalSetGetValues(e,"#e_email","#id-User-edit"));

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

            if(data?.roles){

                const roles = data.roles.map(role => {
                    return role.name
                })


                $('#role-edit-role').val(roles);
            }
            $(InputTarget).val(data.email);
            $(id).val(data.id)

            console.log($(id).val(),$(InputTarget).val());
            } catch (error) {
                console.log(error);
            }
    }
    </script>


  {{-- //form validation scripts --}}
    <script>
        const formAdd = document.querySelector("#formAdd");
        const formEdit = document.querySelector("#edit-user");

        document.addEventListener("DOMContentLoaded", function (e) {
            (function () {
                // Form validation for Add new record
                if (formAdd) {
                    const fv = FormValidation.formValidation(formAdd, {
                        fields: {
                            email: {
                                validators: {
                                    notEmpty: {
                                        message: "Please enter your email",
                                    },
                                    emailAddress: {
                                        message: "Please enter valid email address",
                                    },
                                },
                            },
                        Password: {
                        validators: {
                            notEmpty: {
                                message: "Please enter password",
                            },
                            stringLength: {
                                min: 8,
                                message:
                                    "Password must be more than 8 characters",
                            },
                        },
                    },
                    confirmPassword: {
                        validators: {
                            notEmpty: {
                                message: "Please enter a password",
                            },
                            identical: {
                                compare: function () {
                                    return formAdd.querySelector(
                                        '[name="Password"]'
                                    ).value;
                                },
                                message:
                                    "The password and its confirm are not the same",
                            },
                            stringLength: {
                                min: 8,
                                message:
                                    "Password must be more than 8 characters",
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
                // Form validation for Add new record
                if (formEdit) {
                    const fv = FormValidation.formValidation(formEdit, {
                        fields: {
                            email: {
                                validators: {
                                    notEmpty: {
                                        message: "Please enter your email",
                                    },
                                    emailAddress: {
                                        message: "Please enter valid email address",
                                    },
                                },
                            },
                        NewPassword: {
                        validators: {
                            notEmpty: {
                                message: "Please enter new password",
                            },
                            stringLength: {
                                min: 8,
                                message:
                                    "Password must be more than 8 characters",
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
        });



    </script>
@endsection
