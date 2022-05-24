@extends('layouts.app')

@section('title', "Documentation")

@section('content')
<!-- Page content-->
<!-- Page content-->
<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <div class="mt-5 pl-4 pr-4 pt-4 pb-4">
                <h1 class="display-4">@lang('lang.text_create_doc') </h1>
                <p>@lang('lang.text_sous_doc')</p>

                <hr>

                <form novalidate action="{{ route('doc.store') }}" method="POST" enctype="multipart/form-data">
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
                                        <label for="title">Document title:</label>
                                        <input type="text" id="title" class="form-control" name="doc_title_en"
                                            placeholder="Enter your title" required>
                                    </div>
                                    <div class="control-group col-12 mt-2">
                                        <label for="path_en">File:</label>
                                        <input type="file" id="title" class="form-control" name="path_en"
                                            placeholder="Select your file" required>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="french" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="control-group col-12">
                                        <label for="title_fr">Titre du document:</label>
                                        <input type="text" id="title_fr" class="form-control" name="doc_title_fr"
                                            placeholder="Entrez votre titre" required>
                                    </div>
                                    
                                    <div class="control-group col-12 mt-2">
                                        <label for="path_en">Fichier:</label>
                                        <input type="file" id="title" class="form-control" name="path_fr"
                                            placeholder="Selectionner votre fichier" required>
                                    </div>
                                </div>
                            </div>
                        
                        
                      
                    </div>
                    <div class="row mt-2">
                        <div class="control-group col-12 text-center">
                            <button id="btn-submit" class="btn btn-primary">
                            @lang('lang.text_submit')
                            </button>
                        </div>
                    </div>
                    
                </form>
            </div>

        </div>
    </div>
    
</div>

@endsection