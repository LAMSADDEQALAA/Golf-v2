@extends("layout.app")
@include("FormAssets")
@section('title','Image Terrain De Golf Add Form')


@section("content")
    <form class="form-horizontal m-t-40">
        <div class="form-group">
            <label class="form-label">Select File</label>
            <input type="file" class="form-control">
        </div>
        <div class="form-group">
            <label class="form-label">Select Terrain...</label>
            <select class="form-select col-12" id="inlineFormCustomSelect">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="form-actions">
            <div class="card-body">
                <button type="submit" class="btn btn-success text-white">Save</button>
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





