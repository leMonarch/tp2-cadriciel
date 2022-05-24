@extends('layouts.app')

@section('title', "@lang('lang.text_modify_student')")

@section('content')
<!-- Page content-->
<div class="container">   
    <div class="row">
                <!-- Blog post-->
            <div class="mx-auto col-lg-8">
                <div class="card">
                    <a href=""><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                    <div class="card-body">
                        <form method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="control-group col-12">
                                    <label for="nom">@lang('lang.text_student')</label>
                                    <input type="text" id="nom" class="form-control" name="nom"
                                        placeholder="Nom de l'élève" value="{{$etudiant->nom}}" required>
                                </div>
                                <div class="control-group col-12 mt-2">
                                    <label for="adresse">@lang('lang.text_student')</label>
                                    <input type="text" id="adresse" class="form-control" name="adresse" placeholder="Adresse civique" value="{{$etudiant->adresse}}" required>
                                </div>
                                <div class="control-group col-12 mt-2">
                                    <label for="phone">@lang('lang.text_student')</label>
                                    <input type="phone" id="phone" class="form-control" name="phone" placeholder="Numéro de téléphone" value="{{$etudiant->phone}}" required>
                                </div>
                                <div class="control-group col-12 mt-2">
                                    <label for="email">@lang('lang.text_student')</label>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="Votre courriel" value="{{$etudiant->email}}" required>
                                </div>
                                <div class="control-group col-12 mt-2">
                                    <label for="date_naissance">@lang('lang.text_student')</label>
                                    <input type="date" id="date_naissance" class="form-control" name="date_naissance" placeholder="Date de naissance" value="{{date('Y-m-d', strtotime($etudiant->date_naissance))}}" required>
                                </div>
                                <div class="control-group col-12 mt-2">
                                    <label for="ville">@lang('lang.text_student')</label>
                                    <select name="ville_id" id="ville">
                                    <option value="{{$etudiant->etudiantHasVille->id}}">{{ $etudiant->etudiantHasVille->ville_nom }}</option>
                                    @foreach($villes as $ville)
                                            <option value="{{$ville->id}}">{{ $ville->ville_nom }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                
                            </div>
                            <div class="row mt-2">
                                <div class="control-group col-12 text-center">
                                    <button id="btn-submit" class="btn btn-success">
                                    @lang('lang.text_modify_student_btn')Modifier la fiche de l'étudiant
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
                
            </div>
        
    </div>  
</div>
@endsection