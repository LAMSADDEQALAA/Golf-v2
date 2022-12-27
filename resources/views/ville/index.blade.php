@extends("layout.app")
@include('DataTableAssets')
@section('title','Villes DataTable')

@php
    $name="ville";
@endphp

@section("content")
<div class="table-responsive m-t-40">
    <table id="example23"
        class="display nowrap table table-hover table-striped border"
        cellspacing="0" width="100%">
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

