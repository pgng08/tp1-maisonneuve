@extends('layouts.app')

@section('title', 'Maisonneuve - Bienvenue')

@section('content')


    <div class="text-center mt-5">
        <h1 class="display-3 mt-3">
            {{ config('app.name') }}
        </h1>
        <p class="lead">Bienvenue au site internet pour recueillir de l'information auprès des étudiants du Collège de
            Maisonneuve.</p>
    </div>

    <div class="col-md-4 text-left mt-5">
        <p><small>TP 1 : Laravel - CRUD</small></p>
        <p><small>Cours : Cadriciel Web</small></p>
        <p><small>Description du travail: Créer un site web dynamique en utilisant le cadriciel Laravel, pour recueillir de
                l'information auprès des étudiants du Collège Maisonneuve.</small></p>
    </div>
@endsection
