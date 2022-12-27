@extends("layout.app")
@include("FormAssets")
@section('title','Roles Add Form')


@section("content")
    <form class="form-horizontal m-t-40">
        <div class="form-group">
            <label class="form-label">Role Name</label>
            <input type="text" class="form-control" placeholder="Role Name...">
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





