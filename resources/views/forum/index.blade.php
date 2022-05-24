@extends('layouts.app')

@section('title', "Forum")

@section('username', "$username")

@section('content')
<!-- Page content-->
<div class="container">  
    <div class="mb-4 col-sm-2">
        <a class="nav-link btn-primary text-white text-center" href="{{ route('forum.create') }}">@lang('lang.text_write_article')</a>  
    </div> 
    <div class="row">
        @forelse($articles as $article)
        <div class="mb-4">
            <div class="card">
                <div class="card-body">
                    <p class="card-title h4">{{ $article->name }}</p>
                    <h3 class="card-title">{{ $article->titre }}</h3>
                    <blockquote class="card-title">{{ $article->contenu }}</blockquote>
                    @if($article->name == $username)<a class="btn btn-secondary" href="{{ route('forum.edit', $article->id ) }}">@lang('lang.text_edit')</a>@endif
                </div>
            </div>
        </div>
        @empty
        <div class="mb-4">
            <div class="card">
                <div class="card-body">
                    <p>@lang('lang.text_forum_no_article')</p>
                </div>
            </div>
        </div>
            
        @endforelse
    </div>
</div>
@endsection