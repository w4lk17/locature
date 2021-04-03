@extends('layouts.master')

@section('content')
                <div class="content content-boxed">
                    <div class="row">
                        <div class="col-12">
                        <form action="/account/settings" method="POST">
                        {{ csrf_field() }}
                            <div class="block block-bordered">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Informations de base</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                                            <i class="si si-close"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <div>
                                         @if (session('errorI'))
                                         <div class="alert alert-danger">
                                             {{ session('errorI') }}
                                         </div>
                                         @endif
                                         @if (session('successI'))
                                         <div class="alert alert-success">
                                             {{ session('successI') }}
                                         </div>
                                     @endif
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Nom</label>
                                            <input type="text" class="form-control"  value="{{ $user->last_name }}" name="last_name" id="lname" maxlength="20">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Prenoms</label>
                                            <input type="text" class="form-control"  value="{{ $user->first_name}}" name="first_name" id="fname" maxlength="20">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Addresse</label>
                                            <input type="text" id="address" class="form-control"  value="{{ $user->address}}" name="address" maxlength="50">
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Numéro carte d identité </label>
                                            <input type="text" class="form-control" value="{{ $user->cni}}" name="cni" id="cni" maxlength="50">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Téléphone</label>
                                            <input type="text"  id="telephone" class="form-control"  value="{{ $user->telephone}}" name="tel" maxlength="30">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email"  id="email" class="form-control"  value="{{ $user->email}}" name="email" maxlength="80">
                                        </div>
                                    </div>
                                    <div class="block-content border-top border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row my-3">
                                        <button class="btn btn-primary ml-auto" id="sprofile" type="submit">Enrégistrer</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                        <form action="/account/settings/pwd" method="POST">
                            {{ csrf_field() }}
                            <div class="block block-bordered">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Changer Le Mot de passe</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                                            <i class="si si-close"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <div>
                                        <!-- Success message -->
                                        @if(Session::has('successM'))
                                        <div class="alert alert-success">
                                            {{Session::get('successM')}}
                                        </div>
                                        @endif
                                        <!-- Error message -->
                                        @if(Session::has('errorM'))
                                        <div class="alert alert-danger">
                                            {{Session::get('errorM')}}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Ancien mot de passe (*)</label>
                                        <input type="password" class="form-control {{ $errors->has('old_password') ? 'error' : '' }}" name="old_password"  maxlength="20" >

                                        <!-- Error -->
                                        @if ($errors->has('old_password'))
                                        <div class="error">
                                           {{ $errors->first('old_password') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Nouveau mot de passe (*)</label>
                                        <input type="password" id="password" class="form-control {{ $errors->has('password') ? 'error' : '' }}" name="password"  maxlength="20" >

                                        <!-- Error -->
                                        @if ($errors->has('password'))
                                        <div class="error">
                                           {{ $errors->first('password') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Confirmez le mot de passe (*)</label>
                                        <input type="password" id="password2" class="form-control {{ $errors->has('confPassword') ? 'error' : '' }}" name= "confPassword"  maxlength="20" >

                                        <!-- Error -->
                                        @if ($errors->has('confPassword'))
                                        <div class="error">
                                            {{ $errors->first('confPassword') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="block-content border-top border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row my-3">
                                        <button class="btn btn-primary ml-auto " id="spass" type="submit">Enrégistrer</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- END Interactive Options -->
@endsection
