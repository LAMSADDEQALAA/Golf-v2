@extends("layout.app")

@section("section","Terrains")
@section('title','Details')


@section("content")
<div class="col-xl-12">
    <div class="nav-align-left mb-4">
      <ul class="nav nav-pills me-3" role="tablist">
        <li class="nav-item">
          <button
            type="button"
            class="nav-link active"
            role="tab"
            data-bs-toggle="tab"
            data-bs-target="#navs-pills-left-Details"
            aria-controls="navs-pills-left-Details"
            aria-selected="true"
          >
           Details
          </button>
        </li>
        <li class="nav-item">
          <button
            type="button"
            class="nav-link"
            role="tab"
            data-bs-toggle="tab"
            data-bs-target="#navs-pills-left-Images"
            aria-controls="navs-pills-left-Images"
            aria-selected="false"
          >
            Images
          </button>
        </li>
        <li class="nav-item">
          <button
            type="button"
            class="nav-link"
            role="tab"
            data-bs-toggle="tab"
            data-bs-target="#navs-pills-left-Videos"
            aria-controls="navs-pills-left-Videos"
            aria-selected="false"
          >
            Videos
          </button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-pills-left-Details" role="tabpanel">
            <h6 class="pb-1 mb-4 text-muted">Terrain Details</h6>
            <div class="mb-3">
                <strong>
                    Nom
                  </strong>
                  <p class="mb-0">
                    {{ $terrain->nom }}
                  </p>
            </div>

            <div class="mb-3">
                <strong>
                    Address Email
                  </strong>
                  <p class="mb-0">
                    {{ $terrain->email }}
                  </p>
            </div>

            <div class="mb-3">
                <strong>
                    Ville
                  </strong>
                  <p class="mb-0">
                    {{ $terrain->ville->nom }}
                  </p>
            </div>

            <div class="mb-3">
                <strong>
                    region
                  </strong>
                  <p class="mb-0">
                    {{ $terrain->region }}
                  </p>
            </div>

            <div class="row mb-3">
                <div class="col-2">
                    <strong>
                        Phone 1
                      </strong>
                      <p class="mb-0">
                        {{ $terrain->phone1 }}
                      </p>
                </div>
                <div class="col-2">
                    <strong>
                        Phone 2
                      </strong>
                      <p class="mb-0">
                        {{ $terrain->phone2 }}
                      </p>
                </div>
              </div>

          <div class="row mb-3">

            <div class="col-2">
                <strong>
                    Par
                  </strong>
                  <p class="mb-0">
                    {{ $terrain->par }}
                  </p>
            </div>
            <div class="col-2">
                <strong>
                    Number of holes
                  </strong>
                  <p class="mb-0">
                    {{ $terrain->NumHoles }}
                  </p>
            </div>
            <div class="col-2">
                <strong>
                    lengh
                  </strong>
                  <p class="mb-0">
                    {{ $terrain->lengh }}
                  </p>
            </div>

          </div>

          <div class="mb-3">
            <strong>
                Descriptions
              </strong>
              <p class="mb-0">
                {{ $terrain->description }}
              </p>
          </div>

        </div>
        <div class="tab-pane fade" id="navs-pills-left-Images" role="tabpanel">
            <div class="d-flex justify-content-between mb-4">
                <h6 class="pb-1 mb-4 text-muted">Terrain Images</h6>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-modal"><i class="ti ti-plus me-sm-1"></i><span class="d-none d-sm-inline-block z-n1">Add New Images</span></button>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
                @forelse ($terrain->Images as $image )
                    <div class="col position-relative">
                        @if ($image->ismain == true)
                        <div class="position-absolute end-0 me-4 top-0 mt-4" style="z-index: 2;">
                            <span class="badge bg-label-primary">Main</span>
                          </div>
                        @endif
                        <div class="card h-100">
                        <img class="card-img-top" src="{{ asset($image->ImgPath) }}" alt="Card image cap" />
                        <div class="card-body d-flex">
                            <form action="{{ route("image.destroy",["image"=> $image->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="ti ti-trash me-sm-1"></i></button>
                            </form>
                            @if($image->ismain == false)
                            <form action="{{ route("image:setmain",["image"=> $image->id]) }}" class="ms-2" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Set as main"><i class="ti ti-star me-sm-1"></i></button>
                            </form>
                            @endif
                        </div>
                        </div>
                    </div>
                @empty
                <strong>This Record doesn't have any images</strong>
                @endforelse
              </div>
        </div>
        <div class="tab-pane fade" id="navs-pills-left-Videos" role="tabpanel">
            <div class="d-flex justify-content-between mb-4">
                <h6 class="pb-1 mb-4 text-muted">Terrain Videos</h6>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-modal-video"><i class="ti ti-plus me-sm-1"></i><span class="d-none d-sm-inline-block z-n1">Add New Video Links</span></button>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
                @forelse ($terrain->Videos as $video )
                    <div class="col position-relative">
                        <div class="card">
                            <iframe width="400" height="350" src="{{ $video->VideoUrl }}"
                               frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="card-body d-flex">
                            <form action="{{ route("video.destroy",["video"=> $video->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="ti ti-trash me-sm-1"></i></button>
                            </form>
                        </div>
                        </div>
                    </div>
                @empty
                <strong>This Record doesn't have any Videos</strong>
                @endforelse
              </div>
        </div>
      </div>
    </div>
  </div>
 {{-- ADD images modal --}}
 <div class="modal fade" id="add-modal"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modalCenterTitle">Images Add Form</h5>
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
        ></button>
        </div>
        <form action="{{ route('image.store') }}" id="add-image" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <input type="hidden" name="terrain_id" value="{{ $terrain->id }}">
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label mb-1">Images</label>
                <input class="form-control" name="file[]" type="file" id="formFileMultiple" multiple />
              </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
            Close
        </button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
    </div>
</div>

{{-- ADD videos modal --}}
<div class="modal fade" id="add-modal-video"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="modalCenterTitle">Videos Add Form</h5>
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
        ></button>
        </div>
        <form action="{{ route('video.store') }}" id="add-image" method="post">
        @csrf
        <div class="modal-body">
            <input type="hidden" name="terrain_id" value="{{ $terrain->id }}">
            <div class="mb-3">
                <label for="Links" class="form-label">Links</label>
                <input id="Links"  class="form-control" name="videolinks" placeholder="Link1, Link2, Link3" />
              </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
            Close
        </button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
    </div>
</div>


@endsection


@section("page.css")
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />

@endsection

@section("page.js")
<script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
<script src="{{ asset('assets/js/forms-tagify.js') }}"></script>

@endsection
