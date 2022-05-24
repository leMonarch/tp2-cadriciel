@extends('layouts.app')

@section('title', "Documentation")

@section('content')
<!-- Page content-->
<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <div class="mt-5 pl-4 pr-4 pt-4 pb-4">
                <h1 class="display-4">@lang('lang.text_create_message') </h1>
                <p>@lang('lang.text_soutitre_create_message')</p>

                <hr>

                <form novalidate action="{{ route('doc.store') }}">
                    @csrf
                    @method('PUT')
                    <div class="row">   
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#english" type="button" role="tab" aria-controls="home" aria-selected="true">English</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#french" type="button" role="tab" aria-controls="profile" aria-selected="false">Français</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="home-tab">
                                <div class="control-group col-12">    
                                    <label for="title">Document title:</label>
                                    <input type="text" id="title" class="form-control" name="doc_title_en"
                                        placeholder="Enter your title" value="{{ $document->doc_title_en }}" required>
                                </div>
                                <div class="control-group col-12 mt-2">
                                    <label for="path_en">File:</label>
                                    <input type="file" id="title" class="form-control" name="path_en"
                                        placeholder="Select your file" value="{{ $document->path_en }}" required>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="french" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="control-group col-12">
                                    <label for="title_fr">Titre du document:</label>
                                    <input type="text" id="title_fr" class="form-control" name="doc_title_fr"
                                        placeholder="Entrez votre titre" value="{{ $document->doc_title_fr }}" required>
                                </div>
                                
                                <div class="control-group col-12 mt-2">
                                    <label for="path_en">Fichier:</label>
                                    <input type="file" id="title" class="form-control" name="path_fr"
                                        placeholder="Selectionner votre fichier" value="{{ $document->path_fr }}" required>
                                </div>
                            </div>
                        </div>
                        
                        
                      
                    </div>
                        <div class="control-group row mt-2 col-12 text-center">
                            <div class="mb-4 col-sm-2">
                                <a class="nav-link btn-primary text-white text-center" href="{{ route('doc.show') }}">
                                @lang('lang.text_modify')
                                </a>  
                            </div> 
                        </div>
                    </div>
                    
                </form>
                <form method="post">
                    @csrf
                    @method('DELETE')
                    <div class="mb-4 col-sm-2">
                        <a class="nav-link btn-primary text-white text-center" href="{{ route('doc.delete', $document->id) }}">
                        @lang('lang.text_delete')
                        </a>  
                    </div> 
                </form>
            </div>

        </div>
    </div>
    
</div>

@endsection