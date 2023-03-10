@extends("layout.app")
@section("section","Users")
@section('title','Account Settings')



@section("content")
 <div class="card mb-4">
    <h5 class="card-header">Account Settings</h5>
    <div class="card-body">
      <form id="formAccountSettings" method="POST" action="{{ route('user:updatepassword') }}">
        @method('PUT')
        @csrf
        <div class="row">
          <div class="mb-3 col-md-6 form-password-toggle">
            <label class="form-label" for="email">Email</label>
            <div class="input-group input-group-merge mb-3">
              <input
                class="form-control"
                type="text"
                name="email"
                id="email"
                placeholder="Email@example.js..."
                value="{{ Auth::user()->email }}"
                readonly
              />
            </div>
            <label class="form-label" for="currentPassword">Current Password</label>
            <div class="input-group input-group-merge">
              <input
                class="form-control"
                type="password"
                name="currentPassword"
                id="currentPassword"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                value=""
              />
              <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="mb-3 col-md-6 form-password-toggle">
            <label class="form-label" for="newPassword">New Password</label>
            <div class="input-group input-group-merge">
              <input
                class="form-control"
                type="password"
                id="newPassword"
                name="newPassword"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                value=""
              />
              <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
            </div>
          </div>

          <div class="mb-3 col-md-6 form-password-toggle">
            <label class="form-label" for="confirmPassword">Confirm New Password</label>
            <div class="input-group input-group-merge">
              <input
                class="form-control"
                type="password"
                name="confirmPassword"
                id="confirmPassword"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                value=""
              />
              <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
            </div>
          </div>
          <div class="col-12 mb-4">
            <h6>Password Requirements:</h6>
            <ul class="ps-3 mb-0">
              <li class="mb-1">Minimum 8 characters long - the more, the better</li>
              <li class="mb-1">At least one uppercase letter, lowercase letter, one number</li>
            </ul>
          </div>
          <div>
            <button type="submit" class="btn btn-primary me-2">Save changes</button>
            <button type="reset" class="btn btn-label-secondary">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@section("page.css")
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
@endsection


@section("page.js")

<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
<script src="{{ asset('assets/js/pages-account-settings-security.js') }}"></script>

@endsection
