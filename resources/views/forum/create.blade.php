@extends('layouts.app')

@section('title', "Forum")

@section('content')
<!-- Page content-->
<!-- Page content-->
<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <div class="mt-5 pl-4 pr-4 pt-4 pb-4">
                <h1 class="display-4">@lang('lang.text_create_message') </h1>
                <p>@lang('lang.text_soutitre_create_message')</p>

                <hr>

                <form novalidate action="{{ route('forum.store') }}" method="POST">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>                         
                @endforeach
                    @csrf
                    <div class="row">   
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#english" type="button" role="tab" aria-controls="home" aria-selected="true">English</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#french" type="button" role="tab" aria-controls="profile" aria-selected="false">French</button>
                            </li>

                        </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="control-group col-12">    
                                        <label for="title">Message title:</label>
                                        <input type="text" id="title" class="form-control" name="titre_en"
                                            placeholder="Enter your title" required>
                                    </div>
                                    <div class="control-group col-12 mt-2">
                                        <label for="body">Message content:</label>
                                        <textarea id="body" class="form-control" name="contenu_en" placeholder="Enter message"
                                                rows="" required></textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="french" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="control-group col-12">
                                        <label for="title_fr">Titre du message:</label>
                                        <input type="text" id="title_fr" class="form-control" name="titre_fr"
                                            placeholder="Entrez votre titre" required>
                                    </div>
                                    
                                    <div class="control-group col-12 mt-2">
                                        <label for="body_fr">Corps du message</label>
                                        <textarea id="body_fr" class="form-control" name="contenu_fr" placeholder="Entrez votre message" required></textarea>
                                    </div>
                                </div>
                            </div>
                        
                        
                      
                    </div>
                    <div class="row mt-2">
                        <div class="control-group col-12 text-center">
                            <button id="btn-submit" class="btn btn-primary">
                            @lang('lang.text_forum_publish')
                            </button>
                        </div>
                    </div>
                    
                </form>
            </div>

        </div>
    </div>
    
</div>

@endsection