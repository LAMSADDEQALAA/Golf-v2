@extends("layout.app")
@include("FormAssets")
@section('title','Terrain De Golf Add Form')


@section("content")
    <form class="form-horizontal m-t-40">
        <div class="form-group">
            <label class="form-label">Nom</label>
            <input type="text" class="form-control" placeholder="Nom...">
        </div>
        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" placeholder="Email...">
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Phone 1</label>
                    <input type="text" class="form-control" placeholder="Phone Number...">
                </div>
            </div>
            <!--/span-->
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Phone 2</label>
                    <input type="text" class="form-control" placeholder="Phone Number...">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label">Phone 3</label>
                    <input type="text" class="form-control" placeholder="Phone Number...">
                </div>
            </div>
            <!--/span-->
        </div>
        <div class="form-group">
            <label class="form-label">Address</label>
            <input type="text" class="form-control" placeholder="Address...">
        </div>
        <div class="form-group">
            <label class="form-label">Number of Holes</label>
            <input type="text" class="form-control" placeholder="Number of Holes...">
        </div>
        <div class="form-group">
            <label class="form-label">Par</label>
            <input type="text" class="form-control" placeholder="Par...">
        </div>
        <div class="form-group">
            <label class="form-label">Lengh</label>
            <input type="text" class="form-control" placeholder="lengh...">
        </div>
        <div class="form-group">
            <label class="form-label">Description</label>
            <textarea class="form-control" rows="5"></textarea>
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





