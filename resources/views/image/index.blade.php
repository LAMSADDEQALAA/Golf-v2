@extends("layout.app")
@include('DataTableAssets')
@section('title','Image Terrain De Golf  DataTable')

@php
    $name="image";
@endphp

@section("content")
<div class="table-responsive m-t-40">
    <table id="example23"
        class="display nowrap table table-hover table-striped border"
        cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Terrain De Golf</th>
                <th>Image</th>
                <th>Image Path</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>#</td>
                <td>Terrain De Golf</td>
                <td>Image</td>
                <td>Image Path</td>
                <td>
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

