@extends('layouts.app')

@section('title', "Ajouter")

@section('content')
<!-- Page content-->
<div class="container">   
    <div class="row">
                <!-- Blog post-->
            <div class="mx-auto col-lg-8">
                <div class="card">
                    <a href=""><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                    <div class="card-body">
                        <form novalidate method="POST">
                            @csrf
                            <div class="row">
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                        {{ $error }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>                         
                                @endforeach
                                <div class="control-group col-12">
                                    <label for="nom">@lang('lang.text_student')</label>
                                    <input type="text" id="nom" class="form-control" name="nom"
                                        placeholder="Nom de l'élève" required>
                                </div>
                                <div class="control-group col-12 mt-2">
                                    <label for="adresse">@lang('lang.text_address')</label>
                                    <input type="text" id="adresse" class="form-control" name="adresse" placeholder="Adresse civique" required>
                                </div>
                                <div class="control-group col-12 mt-2">
                                    <label for="phone">@lang('lang.text_phone')</label>
                                    <input type="phone" id="phone" class="form-control" name="phone" placeholder="Numéro de téléphone" required>
                                </div>
                                <div class="control-group col-12 mt-2">
                                    <label for="email">@lang('lang.text_email')</label>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="Votre courriel" required>
                                </div>
                                <div class="control-group col-12 mt-2">
                                    <label for="date_naissance">@lang('lang.text_date')</label>
                                    <input type="date" id="date_naissance" class="form-control" name="date_naissance" placeholder="Date de naissance" required>
                                </div>
                                <div class="control-group col-12 mt-2">
                                    <label for="ville">@lang('lang.text_city')</label>
                                    <select name="ville_id" id="ville">
                                    @foreach($villes as $ville)
                                        <option value="{{$ville->id}}">{{$ville->ville_nom}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="control-group col-12 text-center">
                                    <button id="btn-submit" class="btn btn-success">
                                        @lang('lang.text_add')
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