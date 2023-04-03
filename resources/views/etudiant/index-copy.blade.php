@extends('layouts.app')

@section('title', 'Liste des Étudiants')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="display-7 mt-3">@yield('title')</h1>
        </div>
        <hr>
        <div class="col-md-8">
            <p>Voici la liste de tous les étudiants:</p>
        </div>
        <div class="col-md-4">
            <a href="{{ route('etudiant.create') }}" class="btn btn-success">✍ Ajouter un étudiant</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h5>Liste</h5>
                </div> --}}
                <div class="card-body">
                    <ul>
                        @forelse ($etudiants as $etudiant)
                            <li><a href="etudiant/{{ $etudiant->id }}">{{ $etudiant->nom }}</a></li>

                            {{-- <li><a href="{{ route('etudiant.show', $etudiant->id) }}">{{ $etudiant->title }}</a></li> --}}
                        @empty
                            <li class="text-danger">Liste est vide...</li>
                        @endforelse
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection


