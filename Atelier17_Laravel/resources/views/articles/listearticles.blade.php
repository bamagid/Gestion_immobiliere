@extends('layouts.template')
@section('content')
    @if (session('status'))
        <div class="row d-flex justify-content-center align-items-center">
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        </div>
    @endif
    <div class="row mt-2">
        @foreach ($articles as $article)
            <div class="col-lg-6 mt-4 mb-4 ">
                <div class="card z-index-4" style="height:70vh;">
                    <div
                        class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent
    d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/' . $article->image) }}" style="width:400px" alt="image de l'article">
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 ">{{ $article->nom }}</h6>
                        <style>
                            .ellipsis {
                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;
                                max-width: 300px;
                            }
                        </style>
                        <div class="ellipsis">
                            {{ $article->description }}
                        </div>
                        <hr>
                        <div class="d-flex">
                            <i class="fa-solid fa-circle-info me-2"></i>
                            <p class="text-sm me-3"> {{ $article->statut }} </p>
                            <i class="fa-solid fa-location-dot me-2"></i>
                            <p class="text-sm ellipsis" style=" max-width: 300px; "> {{ $article->localisation }} </p>

                        </div>
                        <div class="card-body" style="display:flex;justify-content:space-around;flex-wrap:nowrap;">
                            <div>
                                <a href="/articles/{{ $article->id }}" class="btn btn-primary me-3">voir plus</a>
                            </div>
                            <form action="/commentaire" class="comment_class" method="post">
                                @csrf
                                <input type="hidden" name="article_id" value="{{ $article->id }}">
                                <input type="hidden" name="user_id" value='{{ Auth::user()->id }}'>
                                <input type="text" class="input_comment" name="contenu"
                                    placeholder="Taper ici votre commentaire...">
                                <button type="submit" class="card__btn">Commenter</button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        @endforeach
        {{ $articles->links() }}
    </div>
@endsection
