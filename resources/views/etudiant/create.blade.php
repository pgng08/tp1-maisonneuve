@extends('layouts.app')
@section('title', 'Ajouter un étudiant')
@section('content')
    <div class="row">
        <div class="col-12 text-center pt-2">
            <h1 class="display-7 mt-3">@yield('title')</h1>
        </div>
        <!--/col-12-->
    </div>
    <!--/row-->
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <form method="post">
                    @csrf
                    <div class="card-header">
                        👤 Informations
                    </div>
                    <div class="card-body">
                        <div class="control-grup col-12">
                            <label for="nom">Nom:</label>
                            <input type="text" id="nom" name="nom" class="form-control"
                                value="{{ old('nom') }}">
                            @error('nom')
                                <span class="text-danger small">{{ $errors->first('nom') }}</span>
                            @enderror
                        </div>
                        <div class="control-grup col-12">
                            <label for="adresse">Adresse:</label>
                            <input type="text" id="adresse" name="adresse" class="form-control"
                                value="{{ old('adresse') }}">
                            @error('adresse')
                                <span class="text-danger small">{{ $errors->first('adresse') }}</span>
                            @enderror
                        </div>
                        <div class="control-grup col-12">
                            <label for="phone">Téléphone:</label>
                            <input type="number" id="phone" name="phone" class="form-control"
                                placeholder="1234567890" min="1" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="text-danger small">{{ $errors->first('phone') }}</span>
                            @enderror
                        </div>
                        <div class="control-grup col-12">
                            <label for="email">Courriel:</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger small">{{ $errors->first('email') }}</span>
                            @enderror
                        </div>
                        <div class="control-grup col-12">
                            <label for="date_naissance">Date de naissance:</label>
                            <input type="date" id="date_naissance" name="date_naissance" class="form-control"
                                value="{{ old('date_naissance') }}">
                            @error('date_naissance')
                                <span class="text-danger small">{{ $errors->first('date_naissance') }}</span>
                            @enderror
                        </div>
                        <div class="control-grup col-12">
                            <label for="ville">Ville:</label><br>
                            <select name="ville_id" id="ville">
                                @foreach ($villes as $ville)
                                    <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                                @endforeach
                            </select>
                            @error('ville')
                                <span class="text-danger small">{{ $errors->first('ville') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <input type="reset" class="btn btn-secondary" value="↺ Réinitialiser">
                        <input type="submit" class="btn btn-primary" value="✓ Soumettre">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
