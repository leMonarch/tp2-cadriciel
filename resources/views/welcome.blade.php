@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one mt-5">{{ config('app.name')}}</h1>
                <p>Registrariat</p>
                <a href="{{ route('etudiant') }}" class="btn btn-outline-primary">Voir les étudiants</a>
            </div>
        </div>
    </div>
@endsection