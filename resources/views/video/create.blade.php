@extends("layout.app")
@include("FormAssets")
@section('title','Video Terrain De Golf Add Form')


@section("content")
    <form class="floating-labels m-t-40">
        <div class="form-group">
            <label for="example-email">Video url</label>
            <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Url">
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





