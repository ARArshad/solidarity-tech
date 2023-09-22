@extends('auth.main')

@section('content')

    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="vendors/images/login-page-img.png" alt=""/>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Register</h2>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="input-group custom">
                                <input type="text"
                                       class="form-control form-control-lg @error('name') is-invalid @enderror"
                                       placeholder="Name" name="name" id="name" value="{{ old('name') }}"
                                       autocomplete="name" autofocus/>

                                <div class="input-group-append custom">
							       <span class="input-group-text">
                                     <i class="zcon-copy dw dw-user1"></i>
                                   </span>
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group custom">
                                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                       placeholder="Email" name="email" id="email" value="{{ old('email') }}" autocomplete="email" autofocus/>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <div class="input-group-append custom">
							        <span class="input-group-text">
                                      <i class="zcon-copy dw dw-user1"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="input-group custom">
                                <input type="password" name="password" id="password"
                                       class="form-control form-control-lg @error('password') is-invalid @enderror"
                                       placeholder="**********" autocomplete="current-password"/>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong></span>
                                @enderror

                                <div class="input-group-append custom">
								<span class="input-group-text">
                                  <i class="dw dw-padlock1"></i>
                                </span>
                                </div>
                            </div>

                            <div class="input-group custom">
                                <input type="password" name="password_confirmation" id="password-confirm"
                                       class="form-control form-control-lg"
                                       placeholder="**********" autocomplete="new-password"/>

                                <div class="input-group-append custom">
								<span class="input-group-text">
                                  <i class="dw dw-padlock1"></i>
                                </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                                    </div>

                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">
                                        OR
                                    </div>

                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block"
                                           href="{{route('login')}}">Login</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
