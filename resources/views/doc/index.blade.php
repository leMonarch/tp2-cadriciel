@extends('layouts.app')

@section('title', "Documentation")

@section('username', "$username")

@section('content')
<div class="container"> 
<div class="mb-4 col-sm-2">
        <a class="nav-link btn-primary text-white text-center" href="{{ route('doc.create') }}">@lang('lang.text_doc_index_add')</a>  
    </div>
    <div class="row">

    
    
        @forelse($documents as $document)
                
            <div class="mb-4 col-lg-3">
                <div class="card">
                    <a href=""><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                    <div class="card-body">
                      <!-- Blog post-->  
                      <h2 class="card-title h4">{{ $document->documentHasUser->name }}</h2>
                        <p class="card-title">{{ $document->path }}</p>
                        <p class="card-title">{{ $document->doc_title }}</p>
                        <p class="card-title">{{ date('Y-m-d', strtotime($document->created_at)) }}</p>
                        @if($document->documentHasUser->name == $username)<a class="btn btn-secondary" href="{{ route('doc.edit', $document->id ) }}">@lang('lang.text_edit')</a>@endif
                    </div>
                </div>
                
            </div>
        @empty
            <p>@lang('lang.text_doc_index_no_doc')</p>
        @endforelse
        
    </div>  
</div>
@endsection