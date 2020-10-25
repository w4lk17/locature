
@extends('layouts.master')

@section('content')
<!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                            <h1 class="flex-sm-fill h3"> ajouter utilisateur</h1>
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item">
                                        <a class="link-fx" href="/admin/users">utilisateurs</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <a class="link-fx" href="">créer</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
<!-- END Hero -->
<!-- Page Content -->
                <div class="content">
                    <!-- Basic -->
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">Creation dun nouveau utilisateur</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <form class="js-validation-signup" action="/admin/users" method="POST">

                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-5 offset-md-3">
                                        <div class="form-group">
                                            <label for="example-text-input">Nom</label>
                                            <input type="text" class="form-control form-control-alt" id="signup-username" name="last_name" placeholder="Nom">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email-input">Prenom</label>
                                            <input type="text" class="form-control form-control-alt" id="signup-username" name="first_name" placeholder="Prenom">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-password-input">Email</label>
                                            <input type="email" class="form-control form-control-alt" id="signup-email" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label>Roles</label>
                                            {{-- <div class="custom-control custom-radio mb-1">
                                                <input type="radio" class="custom-control-input" id="example-radio-custom1" name="role" value="admin" checked>
                                                <label class="custom-control-label" for="example-radio-custom1">Administrateur</label>
                                            </div> --}}
                                            <div class="custom-control custom-radio mb-1">
                                                <input type="radio" class="custom-control-input" id="example-radio-custom2" name="role" value="manager">
                                                <label class="custom-control-label" for="example-radio-custom2">Manager</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <button type="reset" class="btn btn-btn-sm btn-primary">Annuler</button>
                                            </div>
                                            <div class="col-6 text-right">
                                                <button type="submit" class="btn js-swal-success btn-btn-block btn-success">Valider</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END Basic -->
                </div>
                <!-- END Page Content -->
@endsection
