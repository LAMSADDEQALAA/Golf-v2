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
                        <th>Number of holes</th>
                        <th>Par</th>
                        <th>lengh</th>
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
                        <td>{{ $terrain->NumHoles }}</td>
                        <td>{{ $terrain->par }}</td>
                        <td>{{ $terrain->lengh }}</td>
                        <td>{{ $terrain->phones }}</td>
                        <td>{{ $terrain->description }}</td>
                        <td>
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
                        </ul>
                        </div>
                        <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i id="terrain-add" data-url="{{ route('terrain.edit',["terrain"=>$terrain->id]) }}"  class="Edit-Terrain text-primary ti ti-pencil"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>
<!-- Modal to add new record -->
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
            <label for="Phones" class="form-label">Phone Numbers</label>
            <input id="Phones" type="text" class="form-control" name="phones" placeholder="Phone1, Phone2, Phone3" />

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
        $("#Phones").val(data.phones)
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
@endsection
