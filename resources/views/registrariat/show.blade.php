@extends('layouts.app')

@section('title', "Fiche de l'étudiant")

@section('content')
<!-- Page content-->
<div class="container">   
    <div class="row">
                <!-- Blog post-->
            <div class="mx-auto col-lg-8">
                <div class="card">
                    <a href=""><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                    <div class="card-body">
                        <h2 class="card-title h4">{{ $etudiant->nom }}</h2>
                        <p class="card-title">{{ $etudiant->adresse }}</p>
                        <p class="card-title">{{ $etudiant->phone }}</p>
                        <p class="card-title h6">{{ $etudiant->email }}</p>
                        <p class="card-title">{{ date('Y-m-d', strtotime($etudiant->date_naissance)) }}</p>
                        <p class="card-title">{{ $ville_nom }}</p>
                        <a class="btn btn-secondary" href="{{ route('etudiant.edit', $etudiant->id) }}">Modifier la fiche</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Supprimer
                        </button>
                    </div>
                </div>
                
            </div>
        
    </div>  
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         Vous etes certains de supprimer la fiche de cet étudiant?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Supprimer</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection