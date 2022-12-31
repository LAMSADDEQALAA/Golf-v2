@extends("layout.app")
@section("section","Villes")
@section('title','Table')


@section("content")
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
                    @foreach ($villes as $ville )
                    <tr>
                        <td>{{ $ville->id }}</td>
                        <td>{{ $ville->nom }}</td>
                        <td>{{ $ville->terrains_count }}</td>
                        <td>
                        @hasrole("super-admin")
                            <div class="d-flex">
                                <form action="{{ route("ville.destroy",["ville"=> $ville->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-icon delete-record"><i class="text-primary ti ti-trash"></i></button>
                                </form>
                                <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i id="Edit-ville" class="text-primary ti ti-pencil" data-url="{{ route('ville.edit',["ville"=> $ville->id]) }}"  data-bs-toggle="modal" data-bs-target="#modalCenter"></i></a>
                            </div>
                        @else
                            @can("delete-ville")
                            <form action="{{ route("ville.destroy",["ville"=> $ville->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-icon delete-record"><i class="text-primary ti ti-trash"></i></button>
                            </form>
                            @endcan
                            @can("edit-ville")
                            <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i id="Edit-ville" class="text-primary ti ti-pencil" data-url="{{ route('ville.edit',["ville"=> $ville->id]) }}"  data-bs-toggle="modal" data-bs-target="#modalCenter"></i></a>
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
        <!-- Edit Model -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">City edit form</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
                </div>
                <form id="edit-ville" action="{{ route("ville:update") }}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" id="id-ville">
                <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="exampleFormControlReadOnlyInput1" class="form-label">City</label>
                        <input
                        class="form-control"
                        type="text"
                        name="ville"
                        id="e_ville"
                        placeholder="City..."
                        value="City"
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
                <h5 class="modal-title" id="modalCenterTitle">City Add Form</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
                </div>
                <form action="{{ route('ville.store') }}" id="add-ville" method="post">
                @csrf
                <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameWithTitle" class="form-label">City</label>
                        <input
                        type="text"
                        name="ville"
                        id="nameWithTitle"
                        class="form-control"
                        placeholder="Enter Name"
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
        @else
        @can("edit-ville")
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">City edit form</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
                </div>
                <form id="edit-ville" action="{{ route("ville:update") }}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" id="id-ville">
                <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="exampleFormControlReadOnlyInput1" class="form-label">City</label>
                        <input
                        class="form-control"
                        type="text"
                        name="ville"
                        id="e_ville"
                        placeholder="City..."
                        value="City"
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
        @can("add-ville")
        <div class="modal fade" id="add-modal"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">City Add Form</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
                </div>
                <form action="{{ route('ville.store') }}" id="add-ville" method="post">
                @csrf
                <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameWithTitle" class="form-label">City</label>
                        <input
                        type="text"
                        name="ville"
                        id="nameWithTitle"
                        class="form-control"
                        placeholder="Enter Name"
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

    <script>
        $(document).on("click","#Edit-ville",async (e)=>EditModalSetGetValues(e,"#e_ville","#id-ville"));

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

        $(InputTarget).val(data.nom);
        $(id).val(data.id)
        } catch (error) {
            console.log(error);
        }
}
    </script>
    <script>
        const formAdd = document.querySelector("#add-ville");
        const formEdit = document.querySelector("#edit-ville");
       (function () {
                if (formAdd) {
                    const fv = FormValidation.formValidation(formAdd, {
                        fields: {
                            ville: {
                                validators: {
                                    notEmpty: {
                                        message: "Please enter a City name",
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
                            ville: {
                                validators: {
                                    notEmpty: {
                                        message: "Please enter a City name",
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
