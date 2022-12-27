@include("AssetsMaster")
@section("title","login")
@yield("head")
@yield("assets/css")
@yield("login/css")

  <body class="skin-default card-no-border">
    <!-- Content -->
    @yield("PreLoader")
    <section id="wrapper">
        <div class="login-register" >
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" action="{{ route('login') }}" method="POST">
                        @csrf
                        <h3 class="text-center m-b-20">Sign In</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">

                                <input class="form-control @error('email')is-invalid @enderror" type="text"
                                placeholder="Email" name="email"
                                value="{{ old('email') }}"
                                required autocomplete="email"
                                autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                             </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"  placeholder="Password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                             </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="remember" id="customCheck1" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="customCheck1">Remember me</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn w-100 btn-lg btn-info btn-rounded text-white" type="submit">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- / Content -->

    <!-- Core JS -->
    @yield("assets/js")
  </body>
</html>
