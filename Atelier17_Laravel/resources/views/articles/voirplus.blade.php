@extends('layouts.template')
@section('content')
    @if (session('statut'))
        <div class="row d-flex justify-content-center align-items-center">
            <div class="alert alert-success col-lg-4">
                {{ session('statut') }}
            </div>
        </div>
    @endif
    <div class="container">
        <div class="row mt-5 d-flex justify-content-center align-items-center">
            <div class="col-lg-6 mt-2 mb-4 ">
                <div class="card z-index-2" style="height:70vh;">
                    <div
                        class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent
                    d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/' . $article->image) }}" style="width: 400px" alt="image de l'article">
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 ">{{ $article->nom }}</h6>
                        <p class="text-sm ">{{ $article->description }}</p>

                        <hr>
                        <div class="d-flex">
                            <i class="fa-solid fa-circle-info me-2"></i>
                            <p class="text-sm me-3"> {{ $article->statut }} </p>
                            <i class="fa-solid fa-location-dot me-2"></i>
                            <p class="text-sm"> {{ $article->localisation }} </p>
                        </div>
                        <div class="mt-3 d-flex justify-content-center align-items-center">
                            <a href="{{ '/article/modifier/' . $article->id }}" class="btn btn-primary me-3">modifier</a>
                            <a href="/articles/deletearticle/{{ $article->id }}" class="btn btn-primary">Supprimer</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- <div>
        @forelse ($article->comments as $comment)
            {{ $comment->contenu }}
            @foreach ($comment->user as $user)
                {{ $user->name }}
            @endforeach
            <form action="" method="post"></form>
            <button></button>
        @empty
            pas de commentaire pour cet article
        @endforelse
    </div> --}}
@endsection
