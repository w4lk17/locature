
@extends('layouts.master')

@section('content')
    <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3">Modification</h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">Forms</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="">Elements</a>
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
                    <h3 class="block-title">Modification utilisateur</h3>
                </div>
                <div class="block-content block-content-full">
                    <form class="js-validation-signup" action="/admin/users/{{ $user->id }}" method="POST">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                                
                        <div class="row">
                            <div class="col-md-5 offset-md-3">
                                <div class="form-group">
                                    <label for="example-text-input">Nom</label>
                                    <input type="text" class="form-control form-control-alt" id="signup-username" name="last_name" value="{{ $user->last_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="example-email-input">Prenom</label>
                                    <input type="text" class="form-control form-control-alt" id="signup-usernam" name="first_name" value="{{ $user->first_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="example-password-input">Email</label>
                                    <input type="email" class="form-control form-control-alt" id="signup-email" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label>Roles</label>
                                    @foreach ($roles as $role)
                                    <div class="custom-control custom-radio mb-1">
                                        <input type="radio" class="custom-control-input" id="example-radio-custom1" name="role" value="admin" {{ $role->name == 'Admin' ? 'checked' : '' }} >
                                        <label class="custom-control-label" for="example-radio-custom1">Administrateur</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-1">
                                        <input type="radio" class="custom-control-input" id="example-radio-custom2" name="role" value="manager" {{ $role->name == 'Manager' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="example-radio-custom2">Manager</label>
                                    </div>
                                    <div class="custom-control custom-radio mb-1">
                                        <input type="radio" class="custom-control-input" id="example-radio-custom3" name="role" value="client" {{ $role->name == 'Client' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="example-radio-custom3">Client</label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <a href="javascript:history.back()" class="btn btn-btn-sm btn-primary">
		                                    <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour</a>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="submit" class="btn js-swal-success btn-btn-block btn-success btnUpdate">Valider</button>
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