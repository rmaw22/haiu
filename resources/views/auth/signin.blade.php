<!-- Top Main -->
@include('layouts.main_top')
<!-- Top Main -->    
    <!-- Sign in Start -->
        <section class="sign-in-page">
          <div id="container-inside">
              <div id="circle-small"></div>
              <div id="circle-medium"></div>
              <div id="circle-large"></div>
              <div id="circle-xlarge"></div>
              <div id="circle-xxlarge"></div>
          </div>
            <div class="container p-0">
                <div class="row no-gutters">
                    <div class="col-md-6 text-center pt-5">
                        <div class="sign-in-detail text-white">
                            <a class="sign-in-logo mb-5" href="{{ url('/') }}"><img src="{{asset('resources/views/assets/clean/')}}/images/logo-full.png" class="img-fluid" alt="logo"></a>
                            <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                                <div class="item">
                                    <img src="{{asset('resources/views/assets/clean/')}}/images/login/1.png" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Find new friends</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                                <div class="item">
                                    <img src="{{asset('resources/views/assets/clean/')}}/images/login/2.png" class="img-fluid mb-4" alt="logo"> 
                                    <h4 class="mb-1 text-white">Connect with the world</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                                <div class="item">
                                    <img src="{{asset('resources/views/assets/clean/')}}/images/login/3.png" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Create new events</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 bg-white pt-5">
                        <div class="sign-in-from">
                            <h1 class="mb-0">Sign in</h1>
                            <p>Enter your email address and password to access admin panel.</p>
                            <form class="mt-4 was-validated" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Email Address') }}</label>
                                    <input type="email" class="form-control mb-0 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>                                   
                                    @error('email')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">{{ __('Password') }}</label>
                                    <a href="{{ route('password.request') }}" class="float-right">Forgot password?</a>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" autocomplete="current-password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="d-inline-block w-100">
                                    <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                        <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}">
                                        <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Sign in</button>
                                </div>
                                <div class="sign-info">
                                    <span class="dark-color d-inline-block line-height-2">Don't have an account? <a href="{{ url('register') }}">Sign up</a></span>
                                    <ul class="iq-social-media">
                                        <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
                                        <li><a href="#"><i class="ri-twitter-line"></i></a></li>
                                        <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Sign in END -->
<!-- Top Main -->
@include('layouts.main_bottom')
<!-- Top Main -->   