@extends("layout.app")
@include("FormAssets")
@section('title','Users Edit Form')


@section("content")

    <form class="form-horizontal m-t-40">
        <div class="form-group">
            <label class="form-label">Nom</label>
            <input type="text" class="form-control" placeholder="Nom..." required>
        </div>
        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" placeholder="Email..." required>
        </div>
        <div class="form-group">
            <label class="form-label">Password</label>
            <input type="text" class="form-control" placeholder="Password..." required>
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
