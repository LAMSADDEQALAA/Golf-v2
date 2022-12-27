@extends("layout.app")
@include("FormAssets")
@section('title','Ville Add Form')


@section("content")
    <form class="form-horizontal m-t-40">
        <div class="form-group">
            <label class="form-label">Nom De Ville</label>
            <input type="text" class="form-control" placeholder="Ville..">
        </div>
        <div class="form-actions">
            <div class="card-body">
                <button type="submit" class="btn btn-success text-white">Submit</button>
                <button type="button" class="btn btn-dark">Cancel</button>
            </div>
        </div>
    </form>
@endsection

@section("content.css")
  @yield("form/css")
@endsection

@section("content.js")
    @yield("form/js")
@endsection





