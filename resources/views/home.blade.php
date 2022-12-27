@extends("layout.app")
@section('title','DashBoard')



@section("content")
This is some text within a card block.
@endsection

@section("content.css")
  @yield("datatable/css")
@endsection

@section("content.js")
    @yield("datatable/js")
    @yield("extraDatatableActions")
@endsection

