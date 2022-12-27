@extends("layout.app")
@include('DataTableAssets')
@section('title','Terrain De Golf DataTable')

@php
    $name="terraingolf";
@endphp

@section("content")
<div class="table-responsive m-t-40">
    <table id="example23"
        class="display nowrap table table-hover table-striped border"
        cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Address</th>
                <th>Number of holes</th>
                <th>Par</th>
                <th>lengh</th>
                <th>Phones</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>#</td>
                <td>Nom</td>
                <td>Email</td>
                <td>Address</td>
                <td>Number of holes</td>
                <td>Par</td>
                <td>lengh</td>
                <td>Phones</td>
                <td>Description</td>
                <td>
                <a href="" data-bs-toggle="tooltip" data-bs-title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="" data-bs-toggle="tooltip" data-bs-title="Delete"><i class="fa-sharp fa-solid fa-trash"></i></a>                </td>
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

