@extends("layout.app")
@section('title','Video Terrain De Golf Add Form')


@section("content")
    <h4 class="card-title">Animated Line Inputs Form With Floating Labels</h4>
    <h6 class="card-subtitle">Just add <code>floating-labels</code> class to the form.</h6>
    <form class="floating-labels m-t-40">
        <div class="form-group m-b-40">
            <input type="text" class="form-control is-invalid" id="input1">
            <span class="bar"></span>
            <label for="input1">Nom</label>
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





