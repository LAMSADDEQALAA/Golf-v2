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
                    Tootsie roll fruitcake cookie.
                  </p>
            </div>

            <div class="mb-3">
                <strong>
                    Address Email
                  </strong>
                  <p class="mb-0">
                    example@gmail.com
                  </p>
            </div>

            <div class="mb-3">
                <strong>
                    Ville
                  </strong>
                  <p class="mb-0">
                    rabat
                  </p>
            </div>

            <div class="mb-3">
                <strong>
                    Address
                  </strong>
                  <p class="mb-0">
                    Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly.
                  </p>
            </div>

            <div class="mb-3">
                <strong>
                    Phones
                  </strong>
                  <div class="row">
                    <div class="col-2">
                        <p class="mb-0">
                            0687949685469
                        </p>
                    </div>
                    <div class="col-2">
                        <p class="mb-0">
                            0687949685469
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
                    75
                  </p>
            </div>
            <div class="col-2">
                <strong>
                    Number of holes
                  </strong>
                  <p class="mb-0">
                    75
                  </p>
            </div>
            <div class="col-2">
                <strong>
                    lengh
                  </strong>
                  <p class="mb-0">
                    75
                  </p>
            </div>

          </div>

          <div class="mb-3">
            <strong>
                Descriptions
              </strong>
              <p class="mb-0">
                Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly. Bonbon
                jelly-o jelly-o ice cream jelly beans candy canes cake bonbon. Cookie jelly beans marshmallow
                jujubes sweet.
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
            Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet
            roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly
            jelly-o tart brownie jelly.
          </p>
        </div>
      </div>
    </div>
  </div>
@endsection


