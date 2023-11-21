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
                <div class="card z-index-2" style="height:100vh;">
                    <div
                        class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent
                    d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/' . $article->image) }}" style="width: 400px;max-width: 100%; max-height: 100%;" alt="image de l'article">
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
            @if (isset($ok) && $commentaire->user_id === Auth::user()->id)
                <form action="{{ url('/articles/commentaireupdate/' . $commentaire->id) }}" class="comment_class" style="display:flex;justify-content:space-around;flex-wrap:nowrap;" method="post">
                    @csrf
                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                    <input type="hidden" name="id" value='{{ $commentaire->id }}'>
                    <input type="text" class="input_comment" name="contenu" value="{{ $commentaire->contenu }}">
                    <button type="submit" class="card__btn">Modifier</button>
                </form>
            @endif
        </div>
    </div>

    <div class="comments mt-4">
        @forelse ($article->comments as $comment)
            <div class="comment" style="display:flex;justify-content:space-around;flex-wrap:nowrap;">
                <div class="mb-1">Contenu : {{ $comment->contenu }}</div>
                <div class="text-muted mb-1">Auteur : {{ $comment->user->name }}</div>
                <div class="text-muted mb-1"> Date de publication : {{ $comment->created_at }}</div>
                @can('delete', $comment)
                    <a href="/articles/deletecommentaire/{{ $comment->id }}" class="badge rounded-pill bg-primary">Supprimer</a>
                @endcan
                    <a href="/articles/commentaire/{{$comment->id}}" class="badge rounded-pill bg-dark">Modifier</a>
            </div>
        @empty
            <p class="text-muted">Pas de commentaire pour cet article</p>
        @endforelse
    </div>
@endsection