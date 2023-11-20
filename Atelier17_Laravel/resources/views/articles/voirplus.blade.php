@extends('layouts.template')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row mt-2">
        <div class="col-lg-6 mt-4 mb-4">
            <div class="card z-index-2" style="height:60vh;">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                    <div class="bg-gradient-primary  shadow-primary border-radius-lg py-3 pe-1">
                        <div class="chart">
                            <canvas id="chart-bars" class="chart-canvas" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="mb-0">{{ $article->nom }}</h6>
                    <p class="text-sm">{{ $article->description }}</p>
                    <hr class="dark horizontal">
                    <div class="d-flex" style="display:block;justify-content:space-around;">
                        <p class="mb-0 text-sm">
                            <h4>Statut : {{ $article->statut }} </h4>
                        </p>
                        <div >
                            <a href="{{ '/article/modifier/' . $article->id }}" class="badge rounded-pill bg-dark">modifier</a>
                            <a href="#" class="badge rounded-pill bg-primary">supprimer</a>
                        </div>
                    </div>
                </div>
            </div>

            @if (isset($ok) && $commentaire->user_id === Auth::user()->id)
                <form action="{{ url('/articles/commentaireupdate/' . $commentaire->id) }}" class="comment_class" method="post">
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
                <p class="mb-1"><h5>Contenu : {{ $comment->contenu }}</h5></p>
                <p class="text-muted mb-1"><h5>Auteur : {{ $comment->user->name }}</h5></p>
                <p class="text-muted mb-1"><h5> Date de publication : {{ $comment->created_at }}</h5></p> 
                    <a href="/articles/deletecommentaire/{{ $comment->id }}" class="badge rounded-pill bg-primary">Supprimer</a>
                    <a href="/articles/commentaire/{{ $comment->id }}" class="badge rounded-pill bg-dark">Modifier</a>
            </div>
        @empty
            <p class="text-muted">Pas de commentaire pour cet article</p>
        @endforelse
    </div>
@endsection
