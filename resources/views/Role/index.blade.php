@extends("layout.app")
@include('DataTableAssets')
@section('title','Roles DataTable')

@php
    $name="role";
@endphp

@section("content")
<div class="table-responsive m-t-40">
    <table id="example23"
        class="display nowrap table table-hover table-striped border"
        cellspacing="0" width="100%">
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
                <td>#</td>
                <td>Role</td>
                <td>Permissions</td>
                <td>
                 <a href="{{ route("editRolePerm") }}" data-bs-toggle="tooltip" data-bs-title="Edit Permissions"><i class="fa-solid fa-key"></i></a>
                  <a href="" data-bs-toggle="tooltip" data-bs-title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                  <a href="" data-bs-toggle="tooltip" data-bs-title="Delete"><i class="fa-sharp fa-solid fa-trash"></i></a>
                   </td>
            </tr>


        </tbody>
    </table>
</div>
@endsection

@section("content.css")
  @yield("datatable/css")
@endsection

@section("content.js")
    @yield("datatable/js")
    @yield("extraDatatableActions")
@endsection

