@extends('layouts.user_master')

@section('content')

<!-- Page Content -->
<div class="bg-image" style="background-image: url({{ URL::asset('assets/media/photos/photo34@2x.jpg') }});">
    <div class="hero-static bg-black-50">
        <div class="content content-full">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <!-- Unlock Block -->
                    <div class="block block-rondered block-themed mb-0">
                        <div class="block-header bg-danger">
                            <h3 class="block-title">Ecran vérouillé</h3>
                            <div class="block-options">
                                <form action="/logout" method="post" id="logout_form">
                                    @csrf
                                    <a class="btn-block-option" href="#" data-toggle="tooltip" data-placement="left"
                                        title="Se connecter avec un autre compte"
                                        onclick="document.getElementById('logout_form').submit()">
                                        <i class="fa fa-sign-in-alt"></i>
                                    </a>
                                </form>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="p-sm-3 px-lg-4 py-lg-5 text-center">
                                @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                                @endif
                                <img class="img-avatar img-avatar96"
                                    src="{{ asset('assets/media/avatars/avatar10.jpg') }}" alt="">
                                <p class="font-w600 my-2">
                                    {{ $user->email}}
                                </p>

                                <!-- Unlock Form -->
                                <!-- jQuery Validation (.js-validation-lock class is initialized in js/pages/op_auth_lock.min.js which was auto compiled from _es6/pages/op_auth_lock.js) -->
                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form class="js-validation-lock" action="/account/lock" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group py-3">
                                        <input type="password" id="lock-password"
                                            class="form-control form-control-lg form-control-alt " name="password"
                                            placeholder="Mot de passe..">

                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <div class="col-md-7">
                                            <button type="submit" class="btn btn-block btn-light">
                                                <i class="fa fa-fw fa-lock-open mr-1"></i>Dévérouiller
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Unlock Form -->
                            </div>
                        </div>
                    </div>
                    <!-- END Unlock Block -->
                </div>
            </div>
        </div>
        <div class="content content-full font-size-sm text-white text-center">
            <strong>LOCATURE 1.0</strong> &copy; <span data-toggle="year-copy"></span>
        </div>
    </div>
</div>
<!-- END Page Content -->
@endsection