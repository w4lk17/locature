
@extends('layouts.master')

@section('content')

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
                                            <label for="example-text-input">Prenom</label>
                                            <input type="text" class="form-control form-control-alt" id="signup-username" name="first_name" placeholder="Prenom">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email-input">Email</label>
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
