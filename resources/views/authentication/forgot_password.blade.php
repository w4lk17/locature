@extends('layouts.user_master')

@section('content')
<!-- Page Content -->
                <div class="bg-primary-lighter">
                    <div class="hero-static bg-white-75">
                        <div class="content">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-6 col-xl-4">
                                    <!-- Reminder Block -->
                                    <div class="block block-themed block-fx-shadow mb-0">
                                        <div class="block-header">
                                            <h3 class="block-title">Reinitialisation de mot de passe</h3>
                                            <div class="block-options">
                                                <a class="btn-block-option" href="/login" data-toggle="tooltip" data-placement="left" title="Se connecter">
                                                    <i class="fa fa-sign-in-alt" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="block-content">
                                            <div class="p-sm-3 px-lg-4 py-lg-5">
                                                <h1 class="mb-2">Locature</h1>
                                                <p>Saisissez l'adresse e-mail de votre compte utilisateur et nous vous enverrons un lien de réinitialisation de mot de passe..</p>

                                                <!-- Reminder Form -->
                                                <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/op_auth_reminder.min.js which was auto compiled from _es6/pages/op_auth_reminder.js) -->
                                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                                <form class="js-validation-reminder" action="/forgot-password" method="POST">
                                                    {{ csrf_field() }}

                                                    @if (session('success'))
                                                        <div class="alert alert-success">
                                                            {{ session('success') }}
                                                        </div>
                                                    @endif
                                                    @if (session('error'))
                                                        <div class="alert alert-danger">
                                                            {{ session('error') }}
                                                        </div>
                                                    @endif
                                                    <div class="form-group py-3">
                                                        <input type="email" class="form-control form-control-lg form-control-alt" id="reminder-credential" name="email" placeholder=" Entrez votre adresse email">
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6 ">
                                                            <button type="submit" class="btn btn-block btn-primary">
                                                                <i class="fa fa-fw fa-envelope mr-1" aria-hidden="true"></i> Envoyer
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- END Reminder Form -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Reminder Block -->
                                </div>
                            </div>
                        </div>
                        <div class="content content-full font-size-sm text-muted text-center">
                            <strong>Locature 1.0.1</strong> &copy; <span data-toggle="year-copy"></span>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
@endsection
