@extends("layout.app")
@include("FormAssets")
@section('title','Terrain De Golf Edit Form')


@section("content")
    <h4 class="card-title">Animated Line Inputs Form With Floating Labels</h4>
    <h6 class="card-subtitle">Just add <code>floating-labels</code> class to the form.</h6>
    <form class="form-horizontal m-t-40">
        <div class="form-group">
            <label class="form-label">Default Text <span class="help"> e.g. "George deo"</span></label>
            <input type="text" class="form-control" value="George deo...">
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
