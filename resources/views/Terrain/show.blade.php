@extends("layout.app")
@section('title','Terrain')


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

            <div class="mb-3">
                <strong>
                    Phones
                  </strong>
                  <div class="row">
                    <div class="col-2">
                        <p class="mb-0">
                            {{ $terrain->phones }}
                        </p>
                    </div>
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
          <p>
            Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat cake ice
            cream. Gummies halvah tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream
            cheesecake fruitcake.
          </p>
          <p class="mb-0">
            Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie tiramisu halvah
            cotton candy liquorice caramels.
          </p>
        </div>
        <div class="tab-pane fade" id="navs-pills-left-Videos" role="tabpanel">
          <p>
            Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies
            cupcake gummi bears cake chocolate.
          </p>
          <p class="mb-0">
            <iframe width="949" height="534" src="https://www.youtube.com/embed/L5LAqIABGZE"
             title="Laravel 9 Send Email using Gmail SMTP Server 2022 Latest" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </p>
        </div>
      </div>
    </div>
  </div>
@endsection


