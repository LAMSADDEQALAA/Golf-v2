@extends("layout.app")
@include("FormAssets")
@section('title','Roles Edit Form')


@section("content")
<form class="form-horizontal m-t-40">
    <div class="form-group">
        <h5>Roles</h5>
        <div class="row" >
            <fieldset class="col-2">
                <div class="form-check">
                    <input type="checkbox" name="styled_max_checkbox" data-validation-maxchecked-maxchecked="2" data-validation-maxchecked-message="Don't be greedy!" required class="form-check-input" id="customCheck4">
                    <label class="form-check-label" for="customCheck4">I am unchecked checkbox</label>
                </div>
            </fieldset >
            <fieldset class="col-2">
                <div class="form-check">
                    <input type="checkbox" name="styled_max_checkbox" class="form-check-input" id="customCheck5">
                    <label class="form-check-label" for="customCheck5">I am unchecked too</label>
                </div>
            </fieldset>
            <fieldset class="col-2">
                <div class="form-check">
                    <input type="checkbox" name="styled_max_checkbox" class="form-check-input" id="customCheck6">
                    <label class="form-check-label" for="customCheck6">You can check me</label>
                </div>
            </fieldset>
        </div>
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
