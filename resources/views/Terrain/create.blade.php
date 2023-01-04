@extends("layout.app")
@section("section","Fields")
@section('title','Add Form')


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
        <form action="{{ route("terrain.store") }}" id="terrain-add-form" method="POST" enctype="multipart/form-data">
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
                          name="nom"
                          value="{{ old("nom") }}"
                          placeholder="Nom..."
                        />
                      </div>
                      <div class="mb-3">
                        <label for="Email" class="form-label">Email address</label>
                        <input
                          type="text"
                          name="email"
                          class="form-control"
                          id="Email"
                          value="{{ old("email") }}"
                          placeholder="email..."
                        />
                      </div>
                      <div class="mb-3">
                        <label for="Region" class="form-label">Region</label>
                        <input
                          type="text"
                          class="form-control"
                          name="region"
                          id="Region"
                          value="{{ old("Region") }}"
                          placeholder="address..."
                        />
                      </div>
                      <div class="mb-3">
                        <label for="phone1" class="form-label">Phone Number 1</label>
                        <input id="phone1" type="number" class="form-control" value="{{ old("phone1") }}" name="phone1" placeholder="Phone Number 1..." />
                      </div>
                      <div class="mb-3">
                        <label for="phone2" class="form-label">Phone Number 2<span class="text-secondary opacity-25"> (optional)</span></label>
                        <input id="phone2" type="number" class="form-control" value="{{ old("phone2") }}"  name="phone2" placeholder="Phone Number 2..." />
                      </div>
                      <div class="row">
                        <div class="col-2 mb-3">
                            <label for="Par" class="form-label">Par</label>
                            <input
                              type="text"
                              name="par"
                              value="{{ old("par") }}"
                              class="form-control"
                              id="Par"
                              placeholder="Par..."
                            />
                          </div>
                          <div class="col-2 mb-3">
                            <label for="lengh" class="form-label">Lengh</label>
                            <input
                              type="text"
                              name="lengh"
                              value="{{ old("Lengh") }}"
                              class="form-control"
                              id="lengh"
                              placeholder="Lengh..."
                            />
                          </div>
                          <div class="col-2 mb-3">
                            <label for="NumHoles" class="form-label">Number of Holes</label>
                            <input
                              type="text"
                              name="NumHoles"
                              value="{{ old("NumHoles") }}"
                              class="form-control"
                              id="NumHoles"
                              placeholder="Number of Holes..."
                            />
                          </div>
                      </div>

                      <div class="mb-3">
                        <label class="form-label" for="Villes">Villes</label>
                        <select id="Villes" name="ville_id" value="{{ old("ville_id") }}" class="select2 form-select" data-allow-clear="true">
                           @foreach ($villes as $ville )
                              <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                           @endforeach
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="Descriptions" class="form-label">Descriptions</label>
                        <textarea class="form-control" value="{{ old("description") }}" name="description" id="Descriptions" rows="3"></textarea>
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
                            <input id="Links"  class="form-control" name="videolinks" placeholder="Link1, Link2, Link3" />
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


<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>


<script src="{{ asset('assets/js/forms-tagify.js') }}"></script>
<script src="{{ asset('assets/js/form-layouts.js') }}"></script>
<script src="{{ asset('assets/js/form-wizard-icons.js') }}"></script>

<script>

const formAdd = document.querySelector("#terrain-add-form");
document.addEventListener("DOMContentLoaded", function (e) {
            (function () {
                // Form validation for Add new record
                if (formAdd) {
                    const fv = FormValidation.formValidation(formAdd, {
                        fields: {
                            nom: {
                                validators: {
                                    notEmpty: {
                                        message: "Please enter a name",
                                    },
                                },
                            },
                            email: {
                                validators: {
                                    notEmpty: {
                                        message: "Please enter an email",
                                    },
                                    emailAddress: {
                                        message: "Please enter a valid email address",
                                    },
                                },
                            },
                            region: {
                                validators: {
                                    notEmpty: {
                                        message: "Please enter a region",
                                    },

                                },
                            },
                            par: {
                                validators: {
                                    notEmpty: {
                                        message: "Please enter a par",
                                    },

                                },
                            },
                            lengh: {
                                validators: {
                                    notEmpty: {
                                        message: "Please enter a Lengh",
                                    },

                                },
                            },
                            phone1: {
                                validators: {
                                    notEmpty: {
                                        message: "Please enter phone 1",
                                    },

                                },
                            },
                            NumHoles: {
                                validators: {
                                    notEmpty: {
                                        message: "Please enter Number of Holes",
                                    },

                                },
                            },
                            Villes: {
                                validators: {
                                    notEmpty: {
                                        message: "Please Select a City",
                                    },

                                },
                            },
                            description: {
                                validators: {
                                    notEmpty: {
                                        message: "Please enter a description",
                                    },

                                },
                            },

                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap5: new FormValidation.plugins.Bootstrap5({
                                eleValidClass: "",
                                rowSelector: ".mb-3",
                            }),
                            submitButton: new FormValidation.plugins.SubmitButton(),

                            defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                            autoFocus: new FormValidation.plugins.AutoFocus(),
                        },
                        init: (instance) => {
                            instance.on("plugins.message.placed", function (e) {
                                if (
                                    e.element.parentElement.classList.contains(
                                        "input-group"
                                    )
                                ) {
                                    e.element.parentElement.insertAdjacentElement(
                                        "afterend",
                                        e.messageElement
                                    );
                                }
                            });
                        },
                    });
                }
            })();
        });
</script>

@endsection

