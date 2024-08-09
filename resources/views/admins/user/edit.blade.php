@extends('layouts.master')

@section('content')
<div class="content content-full">
    <div class="col-md-9">
        <div class="block block-rounded block-bordered">
            <div class="block-header">
                <h3 class="block-title">Modification utilisateur</h3>
            </div>
            <div class="block-content block-content-full">
                <form class="js-validation-signup" action="/admin/users/{{ $user->id }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                    <div class="form-group col-md-6">
                        <label for="example-text-input">NOM:</label>
                        <input type="text" class="form-control form-control-alt" id="signup-username" name="last_name"
                            value="{{ $user->last_name }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="example-email-input">PRENOM:</label>
                        <input type="text" class="form-control form-control-alt" id="signup-usernam" name="first_name"
                            value="{{ $user->first_name }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="example-password-input">EMAIL:</label>
                        <input type="email" class="form-control form-control-alt" id="signup-email" name="email"
                            value="{{ $user->email }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="example-text-input">ADRESSE:</label>
                        <input type="text" class="form-control form-control-alt" id="signup-usernamee" name="address"
                            value="{{ $user->address }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>ROLES</label>
                        @foreach ($roles as $role)
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" class="custom-control-input" id="example-radio-custom1" name="role"
                                value="admin" {{ $role->name == 'Admin' ? 'checked' : '' }} >
                            <label class="custom-control-label" for="example-radio-custom1">Administrateur</label>
                        </div>
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" class="custom-control-input" id="example-radio-custom2" name="role"
                                value="manager" {{ $role->name == 'Manager' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="example-radio-custom2">Manager</label>
                        </div>
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" class="custom-control-input" id="example-radio-custom3" name="role"
                                value="client" {{ $role->name == 'Client' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="example-radio-custom3">Client</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="form-group row col-md">
                        <div class="col-6">
                            <a href="javascript:history.back()" class="btn btn-primary">Annuler</a>
                        </div>
                        <div class="col-6 text-right">
                            <button type="submit"
                                class="btn js-swal-success btn-btn-block btn-success btnUpdate">Valider</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection