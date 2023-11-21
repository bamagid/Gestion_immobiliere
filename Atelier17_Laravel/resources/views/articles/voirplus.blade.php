@extends('layouts.template')
@section('content')
    @if (session('statut'))
        <div class="row d-flex justify-content-center align-items-center">
            <div class="alert alert-success col-lg-4">
                {{ session('statut') }}
            </div>
        </div>
    @endif

    @if (session('status'))
        <div class="row d-flex justify-content-center align-items-center">
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row mt-5 d-flex justify-content-center align-items-center">
            <div class="col-lg-10 mt-2 mb-4 ">
                <div class="card z-index-2" style="height:auto;">
                    <div
                        class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent
                    d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/' . $article->image) }}" style="width: 400px" alt="image de l'article">
                    </div>
                    <div class="card-body mx-6">
                        <h6 class="mb-0 ">{{ $article->nom }}</h6>
                        <p class="text-sm ">{{ $article->description }}</p>

                        <hr>
                        <div class="d-flex">
                            <i class="fa-solid fa-circle-info me-2"></i>
                            <p class="text-sm me-3"> {{ $article->statut }} </p>
                            <i class="fa-solid fa-location-dot me-2"></i>
                            <p class="text-sm"> {{ $article->localisation }} </p>
                        </div>
                        <div class=" d-flex justify-content-center align-items-center">
                            <a href="{{ '/article/modifier/' . $article->id }}" class="btn btn-success me-3">Modifier Info Bien</a>
                            <a href="/articles/deletearticle/{{ $article->id }}" class="btn btn-danger">Supprimer le Bien</a>
                            
                            @if (isset($ok) && $commentaire->user_id === Auth::user()->id)
                                <form action="{{ url('/articles/commentaireupdate/' . $commentaire->id) }}"
                                    class="comment_class" method="post">
                                    @csrf
                                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                                    <input type="hidden" name="id" value='{{ $commentaire->id }}'>
                                    <input type="text" class="input_comment" name="contenu"
                                        value="{{ $commentaire->contenu }}">
                                    <button type="submit" class="card__btn">Modifier</button>
                                </form>
                            @endif

                        </div>
                    </div>
                    <hr>
                    <h3 style="text-align: center">Commentaires</h3>
                    <div class="comment mx-10 row d-flex justify-content-center align-items-center">
                        @forelse ($article->comments as $comment)
                            <div class="comment mx-10 " >
                                <div class="text-muted mb-2">Auteur : {{ $comment->user->name }}</div>
                                <div class="mb-2">Contenu : {{ $comment->contenu }}</div>
                                <div class="text-muted mb-2"> Date: {{ $comment->created_at }}</div>
                                
                                <a href="/articles/commentaire/{{ $comment->id }}" class="btn btn-success"style="font-size: 15px;"><i class="fa-solid fa-pen-to-square icon-large"></i></a>
                                <a href="/articles/deletecommentaire/{{ $comment->id }}"
                                    class="btn btn-danger" style="font-size: 15px; "><i class="fa-solid fa-delete-left"></i></a>

                            </div>
                            </div>
                        @empty
                            <div class="text-muted ms-12 mb-5 mt-0">
                                Aucun commentaire pour ce bien immobillier
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    @endsection
