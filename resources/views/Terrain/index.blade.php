@extends("layout.app")
@section('title','Terrains')


@section("content")
    <!-- DataTable with Buttons -->
<div class="card">
    <div class="card-datatable table-responsive pt-0">
        <table class="datatables-basic table" data-Show="1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>ville</th>
                        <th>Region</th>
                        <th>Attrs</th>
                        <th>Phones</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($terrains as $terrain )
                    <tr>
                        <td>{{ $terrain->id }}</td>
                        <td>{{ $terrain->nom }}</td>
                        <td>{{ $terrain->email }}</td>
                        <td>{{ $terrain->Ville->nom }}</td>
                        <td>{{ $terrain->region }}</td>
                        <td >
                            <p >Number of holes:<span class="text-secondary opacity-25"> {{ $terrain->NumHoles }}</span></p>
                            <p >Par:<span class="text-secondary opacity-25"> {{ $terrain->par }} </span></p>
                            <p >Lengh:<span class="text-secondary opacity-25"> {{ $terrain->lengh }} </span></p>
                        </td>
                        <td>
                            <p>{{ $terrain->phone1 }}</p>
                            <p>{{ $terrain->phone2 }}</p>
                        </td>
                        <td class="text-break">{{ $terrain->description }}</td>
                        <td>
                        @hasrole("super-admin")
                            <div class="d-inline-block">
                                <a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end m-0">
                                <li><a href="{{ route("terrain.show",["terrain" =>$terrain->id]) }}" class="dropdown-item">Details</a></li>
                                <div class="dropdown-divider"></div>
                                <li>
                                    <form action="{{ route("terrain.destroy",["terrain"=> $terrain->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item text-danger delete-record">Delete</button>
                                    </form>
                                </li>
                                </ul>
                            </div>
                        <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i id="terrain-add" data-url="{{ route('terrain.edit',["terrain"=>$terrain->id]) }}"  class="Edit-Terrain text-primary ti ti-pencil"></i></a>

                        @else
                            <div class="d-inline-block">
                                <a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="text-primary ti ti-dots-vertical"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end m-0">
                                <li>
                                    <a href="{{ route("terrain.show",["terrain" =>$terrain->id]) }}" class="dropdown-item">Details</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                @can("delete-terrain")
                                <li>
                                    <form action="{{ route("terrain.destroy",["terrain"=> $terrain->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item text-danger delete-record">Delete</button>
                                    </form>
                                </li>
                                @endcan
                                </ul>
                            </div>
                            @can("edit-terrain")
                            <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i id="terrain-add" data-url="{{ route('terrain.edit',["terrain"=>$terrain->id]) }}"  class="Edit-Terrain text-primary ti ti-pencil"></i></a>
                            @endcan

                        @endhasrole
                    </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>
<!-- Modal to add new record -->
@hasrole("super-admin")
    <div class="offcanvas offcanvas-end" id="add-new-record">
    <div class="offcanvas-header border-bottom">
      <h5 class="offcanvas-title" id="exampleModalLabel">Edit Record</h5>
      <button
        type="button"
        class="btn-close text-reset"
        data-bs-dismiss="offcanvas"
        aria-label="Close"
      ></button>
    </div>
    <div class="offcanvas-body flex-grow-1">
      <form class="add-new-record pt-0 row g-2" id="form-add-new-record" action="{{ route('terrain:update') }}" method="POST">
        @method("PUT")
        @csrf
        <input type="hidden" name="id" id="id">
        <div class="col-sm-12">
            <label for="Nom" class="form-label">Nom</label>
            <input
              type="text"
              class="form-control"
              id="Nom"
              name="nom"
              placeholder="Nom..."
            />
        </div>
        <div class="col-sm-12">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input
              type="text"
              name="email"
              class="form-control"
              id="Email"
              placeholder="email..."
            />
        </div>
        <div class="col-sm-12">
            <label for="address" class="form-label">region</label>
            <input
              type="text"
              class="form-control"
              name="region"
              id="region"
              placeholder="address..."
            />
        </div>

        <div class="col-sm-12">
            <label for="phone1" class="form-label">Phone Number 1</label>
            <input id="phone1" type="text" class="form-control" name="phone1" placeholder="Phone...." />
        </div>
        <div class="col-sm-12">
            <label for="phone2" class="form-label">Phone Number 2 <span class="text-secondary opacity-25">(optional)</span></label>
            <input id="phone2" type="text" class="form-control" name="phone2" placeholder="Phone...." />
        </div>
        <div class="col-sm-12">
            <label for="exampleFormControlInput1" class="form-label">Par</label>
            <input
              type="text"
              name="par"
              class="form-control"
              id="Par"
              placeholder="Par..."
            />
        </div>
        <div class="col-sm-12">
            <label for="exampleFormControlInput1" class="form-label">Lengh</label>
            <input
              type="text"
              name="lengh"
              class="form-control"
              id="Lengh"
              placeholder="Lengh..."
            />
        </div>
        <div class="col-sm-12">
            <label for="NumHoles" class="form-label">Number of Holes</label>
                <input
                    type="text"
                    name="NumHoles"
                    class="form-control"
                    id="NumHoles"
                    placeholder="Number of Holes..."
                />
        </div>
        <div class="col-sm-12">
            <label class="form-label" for="Villes">Villes</label>
            <select id="Villes" name="ville_id" class="select2 form-select" data-allow-clear="true">
                @foreach ($villes as $ville)
                <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-12 mb-4">
            <label for="Description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="Description" rows="3"></textarea>
        </div>


        <div class="col-sm-12">
          <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Submit</button>
          <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        </div>
      </form>
    </div>
  </div>
@else
    @can("add-terrain")
    <div class="offcanvas offcanvas-end" id="add-new-record">
        <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="exampleModalLabel">Edit Record</h5>
        <button
            type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"
        ></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
        <form class="add-new-record pt-0 row g-2" id="form-add-new-record" action="{{ route('terrain:update') }}" method="POST">
            @method("PUT")
            @csrf
            <input type="hidden" name="id" id="id">
            <div class="col-sm-12">
                <label for="Nom" class="form-label">Nom</label>
                <input
                type="text"
                class="form-control"
                id="Nom"
                name="nom"
                placeholder="Nom..."
                />
            </div>
            <div class="col-sm-12">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input
                type="text"
                name="email"
                class="form-control"
                id="Email"
                placeholder="email..."
                />
            </div>
            <div class="col-sm-12">
                <label for="address" class="form-label">region</label>
                <input
                type="text"
                class="form-control"
                name="region"
                id="region"
                placeholder="address..."
                />
            </div>
            <div class="col-sm-12">
                <label for="phone1" class="form-label">Phone Number 1</label>
                <input id="phone1" type="text" class="form-control" name="phone1" placeholder="Phone...." />
            </div>
            <div class="col-sm-12">
                <label for="phone2" class="form-label">Phone Number 2 <span class="text-secondary opacity-25">(optional)</span></label>
                <input id="phone2" type="text" class="form-control" name="phone2" placeholder="Phone...." />
            </div>
            <div class="col-sm-12">
                <label for="exampleFormControlInput1" class="form-label">Par</label>
                <input
                type="text"
                name="par"
                class="form-control"
                id="Par"
                placeholder="Par..."
                />
            </div>
            <div class="col-sm-12">
                <label for="exampleFormControlInput1" class="form-label">Lengh</label>
                <input
                type="text"
                name="lengh"
                class="form-control"
                id="Lengh"
                placeholder="Lengh..."
                />
            </div>
            <div class="col-sm-12">
                <label for="NumHoles" class="form-label">Number of Holes</label>
                    <input
                        type="text"
                        name="NumHoles"
                        class="form-control"
                        id="NumHoles"
                        placeholder="Number of Holes..."
                    />
            </div>
            <div class="col-sm-12">
                <label class="form-label" for="Villes">Villes</label>
                <select id="Villes" name="ville_id" class="select2 form-select" data-allow-clear="true">
                    @foreach ($villes as $ville)
                    <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-12 mb-4">
                <label for="Description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="Description" rows="3"></textarea>
            </div>


            <div class="col-sm-12">
            <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Submit</button>
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
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

    <script src="{{ asset('assets/vendor/libs/datatables-rowgroup/datatables.rowgroup.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>

    <script src="{{ asset('assets/js/tables-datatables-basic.js') }}"></script>
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>

    <script>
        $(document).on("click","#terrain-add",async (e)=> {
            let url= $(e.target).data("url");
        try {
        let response = await fetch(url,{
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'GET',
        });
        let data = await response.json();

         console.log(data);

        $("#id").val(data.id);
        $("#Nom").val(data.nom)
        $("#Email").val(data.email)
        $("#region").val(data.region)
        $("#phone1").val(data.phone1)
        $("#phone2").val(data.phone2)
        $("#Par").val(data.par)
        $("#Lengh").val(data.lengh)
        $("#NumHoles").val(data.NumHoles)
        $("#Villes").val(data.ville_id)
        $("#Description").val(data.description)

        console.log();
        } catch (error) {
            console.log(error);
        }



        });
    </script>


<script>

const formAdd = document.querySelector("#form-add-new-record");
document.addEventListener("DOMContentLoaded", function (e) {
            (function () {
                // Form validation for Add new record
                if (formAdd) {
                    const fv = FormValidation.formValidation(formAdd, {
                        fields: {
                            nom: {
                                validators: {
                                    notEmpty: {
                                        message: "Please enter a name",
                                    },
                                },
                            },
                            email: {
                                validators: {
                                    notEmpty: {
                                        message: "Please enter an email",
                                    },
                                    emailAddress: {
                                        message: "Please enter a valid email address",
                                    },
                                },
                            },
                            region: {
                                validators: {
                                    notEmpty: {
                                        message: "Please enter a region",
                                    },

                                },
                            },
                            par: {
                                validators: {
                                    notEmpty: {
                                        message: "Please enter a par",
                                    },

                                },
                            },
                            lengh: {
                                validators: {
                                    notEmpty: {
                                        message: "Please enter a Lengh",
                                    },

                                },
                            },
                            phone1: {
                                validators: {
                                    notEmpty: {
                                        message: "Please enter phone 1",
                                    },

                                },
                            },
                            NumHoles: {
                                validators: {
                                    notEmpty: {
                                        message: "Please enter Number of Holes",
                                    },

                                },
                            },
                            Villes: {
                                validators: {
                                    notEmpty: {
                                        message: "Please Select a City",
                                    },

                                },
                            },
                            description: {
                                validators: {
                                    notEmpty: {
                                        message: "Please enter a description",
                                    },

                                },
                            },

                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap5: new FormValidation.plugins.Bootstrap5({
                                eleValidClass: "",
                                rowSelector: ".col-sm-12",
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
