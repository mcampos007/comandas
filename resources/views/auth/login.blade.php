@extends('layouts.app')
@section('body-class','signup-page')
@section('content')
<div class="header header-filter" style="background-image: url(' {{ asset("img/city.jpg") }} '); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <form class="form" method="POST" action="{{ route('login') }}">
                         @csrf
                        <div class="header header-primary text-center">
                            <h4>Ingresa Tus datos</h4>
                            <!-- <div class="social-line">
                                <a href="#pablo" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="#pablo" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#pablo" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div> -->
                        </div>
                        <!-- <p class="text-divider">Or Be Classical</p> -->
                        <div class="content">

                            <!-- <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">face</i>
                                </span>
                                <input type="text" class="form-control" placeholder="Nombre.">
                            </div> -->

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <input type="email"  id="email" name="email" class="form-control" placeholder="Email..." value="{{ old('email') }}" required autocomplete="email" autofocus>

                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                 <input id="password" type="password" placeholder="Password..." class="form-control" name="password" required autocomplete="current-password">
                            </div>

                            <!-- If you want to add a checkbox to this form, uncomment this code -->

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" 
                                    {{ old('remember') ? 'checked' : '' }}>
                                    Recordar Sesión
                                </label>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <!-- <a href="#pablo" class="btn btn-simple btn-primary btn-lg">Ingresar</a> -->
                            <button type="submit" class="btn btn-primary"> Ingresar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.includes.footer')
</div>
@endsection
