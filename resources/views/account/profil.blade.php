@extends('layouts.master')

@section('content')
<div class="content content-full">
    <div class="col-md-6">
        <div class="block block-rounded block-bordered">
            <div class="block-header">
                <h3 class="block-title">Profile</h3>
            </div>
            <div class="block-content block-content-full">
                <div class="form-group">
                    <label>NOM:</label>
                    <input type="text" class="form-control form-control-alt" name="last_name"
                        value="{{ $user->last_name }}" readonly>
                </div>
                <div class="form-group">
                    <label>PRENOM:</label>
                    <input type="text" class="form-control form-control-alt" name="first_name"
                        value="{{ $user->first_name }}" readonly>
                </div>
                <div class="form-group">
                    <label>EMAIL:</label>
                    <input type="email" class="form-control form-control-alt" name="email" value="{{ $user->email }}"
                        readonly>
                </div>
                <div class="form-group">
                    <label>ADRESSE:</label>
                    <input type="text" class="form-control form-control-alt" name="address" value="{{ $user->address }}"
                        readonly>
                </div>
                <div class="form-group">
                    <label>ROLE:</label>
                    @foreach ($roles as $role)
                    <input type="text" class="form-control form-control-alt" name="address" value="{{ $role->name }}"
                        readonly>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="/account/settings" class="btn btn-primary">Modifier</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection