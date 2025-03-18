@extends('layouts.admin')

@section('content')
    
<div class="container">

    <div class="row g-3">

        <!-- Mise à jour des informations du profil -->
        <div class="col-md-6">
            @include('profile.partials.update-profile-information-form')
            <!-- Suppression du compte -->
            @include('profile.partials.delete-user-form')
        </div>

        <!-- Mise à jour du mot de passe -->
        <div class="col-md-6">
            @include('profile.partials.update-password-form')
        </div>

    </div>

</div>

@endsection
