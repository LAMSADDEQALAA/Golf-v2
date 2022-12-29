@extends("layout.app")

@section('title','Terrain De Golf Add Form')


@section("content")
<div class="col-12">
    <div class="bs-stepper vertical wizard-modern wizard-modern-vertical-icons-example mt-2">
    <div class="bs-stepper-header">
        <div class="step" data-target="#Field-Image-Files-vertical-modern">
        <button type="button" class="step-trigger">
            <span class="bs-stepper-circle">
            <i class="ti ti-file-description"></i>
            </span>
            <span class="bs-stepper-label">
            <span class="bs-stepper-title">Field Image Files</span>
            <span class="bs-stepper-subtitle">Setup Field Images</span>
            </span>
        </button>
        </div>
        <div class="line"></div>
        <div class="step" data-target="#Field-Infos-vertical-modern">
        <button type="button" class="step-trigger">
            <span class="bs-stepper-circle">
            <i class="ti ti-list"></i>
            </span>
            <span class="bs-stepper-label">
            <span class="bs-stepper-title">Field Infos</span>
            <span class="bs-stepper-subtitle">Add Field info</span>
            </span>
        </button>
        </div>
        <div class="line"></div>
        <div class="step" data-target="#Video-links-vertical-modern">
        <button type="button" class="step-trigger">
            <span class="bs-stepper-circle"><i class="ti ti-brand-youtube"></i> </span>
            <span class="bs-stepper-label">
            <span class="bs-stepper-title">Video Links</span>
            <span class="bs-stepper-subtitle">Add Video links</span>
            </span>
        </button>
        </div>
    </div>
    <div class="bs-stepper-content">
        <form action="{{ route("terrain.store") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Field-Image -->
        <div id="Field-Image-Files-vertical-modern" class="content">
                <div class="content-header mb-3">
                    <h5 class="card-header">Images</h5>
                    <small>Upload Field Imgaes</small>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                        <input class="form-control" name="file[]" type="file" id="formFileMultiple" multiple />
                      </div>
                    </div>
                    </div>
            <div class="col-12 d-flex justify-content-between">
                <a href="javascript:void(0)"  class="btn btn-label-secondary btn-prev" disabled>
                <i class="ti ti-arrow-left me-sm-1"></i>
                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </a>
                <a href="javascript:void(0)" class="btn btn-primary btn-next">
                <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                <i class="ti ti-arrow-right"></i>
                </a>
            </div>

        </div>

        <!-- Field-Infos -->
        <div id="Field-Infos-vertical-modern" class="content">
            <div class="content-header mb-3">
            <h6 class="mb-0">Field Details</h6>
            <small>Enter Field Details.</small>
            </div>
                <div class="card mb-4">
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="Nom" class="form-label">Nom</label>
                        <input
                          type="text"
                          class="form-control"
                          id="Nom"
                          name="Nom"
                          placeholder="Nom..."
                        />
                      </div>
                      <div class="mb-3">
                        <label for="address" class="form-label">address</label>
                        <input
                          type="text"
                          class="form-control"
                          name="address"
                          id="address"
                          placeholder="address..."
                        />
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input
                          type="text"
                          name="email"
                          class="form-control"
                          id="Email"
                          placeholder="email..."
                        />
                      </div>
                      <div class="mb-3">
                        <label for="Phones" class="form-label">Phone Numbers</label>
                        <input id="Phones" type="text" class="form-control" name="Phones" placeholder="Phone1, Phone2, Phone3" />
                      </div>
                      <div class="row mb-3">
                        <div class="col-2">
                            <label for="exampleFormControlInput1" class="form-label">Par</label>
                            <input
                              type="text"
                              name="Par"
                              class="form-control"
                              id="Par"
                              placeholder="Par..."
                            />
                          </div>
                          <div class="col-2">
                            <label for="exampleFormControlInput1" class="form-label">Lengh</label>
                            <input
                              type="text"
                              name="Lengh"
                              class="form-control"
                              id="Lengh"
                              placeholder="Lengh..."
                            />
                          </div>
                          <div class="col-2">
                            <label for="NumHoles" class="form-label">Number of Holes</label>
                            <input
                              type="text"
                              name="NumHoles"
                              class="form-control"
                              id="NumHoles"
                              placeholder="Number of Holes..."
                            />
                          </div>
                      </div>

                      <div class="mb-3">
                        <label class="form-label" for="Villes">Villes</label>
                        <select id="Villes" name="villes" class="select2 form-select" data-allow-clear="true">
                          <option value="">Select</option>
                          <option value="AL">Alabama</option>
                          <option value="AK">Alaska</option>
                          <option value="AZ">Arizona</option>
                          <option value="AR">Arkansas</option>
                          <option value="CA">California</option>
                          <option value="CO">Colorado</option>
                          <option value="CT">Connecticut</option>
                          <option value="DE">Delaware</option>
                          <option value="DC">District Of Columbia</option>
                          <option value="FL">Florida</option>
                          <option value="GA">Georgia</option>
                          <option value="HI">Hawaii</option>
                          <option value="ID">Idaho</option>
                          <option value="IL">Illinois</option>
                          <option value="IN">Indiana</option>
                          <option value="IA">Iowa</option>
                          <option value="KS">Kansas</option>
                          <option value="KY">Kentucky</option>
                          <option value="LA">Louisiana</option>
                          <option value="ME">Maine</option>
                          <option value="MD">Maryland</option>
                          <option value="MA">Massachusetts</option>
                          <option value="MI">Michigan</option>
                          <option value="MN">Minnesota</option>
                          <option value="MS">Mississippi</option>
                          <option value="MO">Missouri</option>
                          <option value="MT">Montana</option>
                          <option value="NE">Nebraska</option>
                          <option value="NV">Nevada</option>
                          <option value="NH">New Hampshire</option>
                          <option value="NJ">New Jersey</option>
                          <option value="NM">New Mexico</option>
                          <option value="NY">New York</option>
                          <option value="NC">North Carolina</option>
                          <option value="ND">North Dakota</option>
                          <option value="OH">Ohio</option>
                          <option value="OK">Oklahoma</option>
                          <option value="OR">Oregon</option>
                          <option value="PA">Pennsylvania</option>
                          <option value="RI">Rhode Island</option>
                          <option value="SC">South Carolina</option>
                          <option value="SD">South Dakota</option>
                          <option value="TN">Tennessee</option>
                          <option value="TX">Texas</option>
                          <option value="UT">Utah</option>
                          <option value="VT">Vermont</option>
                          <option value="VA">Virginia</option>
                          <option value="WA">Washington</option>
                          <option value="WV">West Virginia</option>
                          <option value="WI">Wisconsin</option>
                          <option value="WY">Wyoming</option>
                        </select>
                      </div>
                      <div>
                        <label for="Descriptions" class="form-label">Descriptions</label>
                        <textarea class="form-control" name="description" id="Descriptions" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
            <div class="col-12 d-flex justify-content-between">
                <a href="javascript:void(0)"  class="btn btn-label-secondary btn-prev">
                    <i class="ti ti-arrow-left me-sm-1"></i>
                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                    </a>
                <a href="javascript:void(0)"  class="btn btn-primary btn-next">
                <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                <i class="ti ti-arrow-right"></i>
                </a>
            </div>
        </div>
        <!-- Video-links -->


        <div id="Video-links-vertical-modern" class="content">
            <div class="content-header mb-3">
            <h6 class="mb-0">Video Links</h6>
            <small>Put Video Links.</small>
            </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="Links" class="form-label">Links</label>
                            <div class="input-group">
                            <span class="input-group-text" id="basic-addon14">https://example.com/users/</span>
                            <input id="Links" type="text" class="form-control" name="videolinks" placeholder="Link1, Link2, Link3" />
                            </div>
                          </div>
                   </div>
                </div>


            <div class="col-12 d-flex justify-content-between">
                <button class="btn btn-label-secondary btn-prev">
                <i class="ti ti-arrow-left me-sm-1"></i>
                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                </button>
                <button class="btn btn-success btn-submit">Submit</button>
            </div>
        </div>
        </form>
    </div>
    </div>
</div>
@endsection



@section("page.css")
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
@endsection

@section("page.js")

<script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>


<script src="{{ asset('assets/js/forms-tagify.js') }}"></script>
<script src="{{ asset('assets/js/form-layouts.js') }}"></script>
<script src="{{ asset('assets/js/form-wizard-icons.js') }}"></script>

@endsection

