@extends('layouts.user_master')

@section('content')

<!-- Page Content -->
            <div class="bg-primary-lighter">
                <div class="hero-static bg-white-75">
                    <div class="content">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-4">
                                <!-- Sign Up Block -->
                                <div class="block block-themed block-fx-shadow mb-0">
                                    <div class="block-header bg-success">
                                        <h3 class="block-title">CRÉER UN COMPTE</h3>
                                        <div class="block-options">
                                            <a class="btn-block-option font-size-sm" href="javascript:void(0)" data-toggle="modal" data-target="#one-signup-terms">View Terms</a>
                                            <a class="btn-block-option" href="/login" data-toggle="tooltip" data-placement="left" title="Se connecter">
                                                <i class="fa fa-sign-in-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <div class="p-sm-3 px-lg-4">
                                            <h1>Locature</h1>
                                            <p>Veuillez remplir les champs suivants pour créer un nouveau compte.</p>

                                            <!-- Sign Up Form -->
                                            <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _es6/pages/op_auth_signup.js) -->
                                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                            <form class="js-validation-signup" action="/register" method="POST">
                                                {{ csrf_field() }}

                                                <div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-alt" id="signup-username" name="last_name" placeholder="Nom">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-alt" id="signup-username" name="first_name" placeholder="Prenom">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control form-control-alt" id="signup-email" name="email" placeholder="Email">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-alt" id="signup-username" name="num_cni" placeholder="numero CNI">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-alt" id="signup-username" name="telephone" placeholder="telephone +228xxxxxxx">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-alt" id="signup-username" name="address" placeholder="adresse">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control form-control-alt" id="signup-password" name="password" placeholder="Mot de passe">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control form-control-alt" id="signup-password-confirm" name="password_confirm" placeholder="Confirmer le mot de passe">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="signup-terms" name="signup-terms">
                                                            <label class="custom-control-label font-w400" for="signup-terms">J'accepte les termes et conditions</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-block btn-success">
                                                            <i class="fa fa-fw fa-plus mr-1"></i> S'inscrire
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- END Sign Up Form -->
                                        </div>
                                    </div>
                                </div>
                                <!-- END Sign Up Block -->
                            </div>
                        </div>
                    </div>
                    <div class="content content-full font-size-sm text-muted text-center">
                        <strong>Locature 1.0</strong> &copy; <span data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
<!-- END Page Content -->
<!-- Terms Modal -->
        <div class="modal fade" id="one-signup-terms" tabindex="-1" role="dialog" aria-labelledby="one-signup-terms" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Terms &amp; Conditions</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-link mr-2" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">I Agree</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- END Terms Modal -->

@endsection
