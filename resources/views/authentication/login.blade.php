@extends('layouts.user_master')

@section('content')
<!-- Page Content -->
<div class="bg-image" style="background-image: url('assets/media/photos/photo6@2x.jpg');">
    <div class="hero-static bg-white-75">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <!-- Sign In Block -->
                    <div class="block block-themed block-fx-shadow mb-0">
                        <div class="block-header">
                            <h3 class="block-title">Se connecter</h3>
                            <div class="block-options">
                                <a class="btn-block-option font-size-sm" href="/forgot-password">Mot de passe
                                    oublié?</a>
                                <a class="btn-block-option" href="/register" data-toggle="tooltip" data-placement="left"
                                    title="Nouveau compte">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="p-sm-3 px-lg-4 py-lg-5">
                                <h1 class="mb-2">Locature</h1>
                                <p>Bienvenue, veuillez vous connecter.</p>

                                <!-- Sign In Form -->
                                <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js) -->
                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form class="js-validation-signin" action="/login" method="POST">
                                    {{ csrf_field() }}

                                    @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                    @endif
                                    @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                    @endif

                                    <div class="py-3">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-alt form-control-lg"
                                                id="login-username" name="email" placeholder="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-alt form-control-lg"
                                                id="login-password" name="password" placeholder="Mot de passe">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="login-remember"
                                                    name="remember_me">
                                                <label class="custom-control-label font-w400"
                                                    for="login-remember">Souviens-toi de moi</label>
                                                     <a class="text-right" href="/acceuil">Aller a l'accueil</a>
                                            </div>
                                            
                                               
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <div class="col-md-8">
                                            <button type="submit" class="btn btn-block btn-primary">
                                                <i class="fa fa-fw fa-sign-in-alt mr-1" aria-hidden="true"></i> Se
                                                connecter
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Sign In Form -->
                            </div>
                        </div>
                    </div>
                    <!-- END Sign In Block -->
                </div>
            </div>
        </div>
        <div class="content content-full font-size-sm text-muted text-center">
            <strong>Locature 1.0</strong> &copy; <span data-toggle="year-copy"></span>
        </div>
    </div>
</div>
<!-- END Page Content -->

@endsection