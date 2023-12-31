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
            <div class="alert alert-success col-lg-4">
                {{ session('status') }}
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row mt-5 d-flex justify-content-center align-items-center">
            <div class="col-lg-10 mt-2 mb-4">
                <div class="card z-index-2" style="height:auto;">
                    <div
                        class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/' . $articles->image) }}"
                            style="width: 100%; height: 350px; object-fit: cover;object-position: center center;"
                            alt="image de l'article">
                    </div>

                    <div class="card-body mx-5">
                        <h6 class="mb-0">{{ $articles->nom }}</h6>
                        <p class="text-sm">{{ $articles->description }}</p>

                        <hr>

                        <div class="d-flex">
                            <i class="fa-solid fa-circle-info me-2"></i>
                            <p class="text-sm me-3">{{ $articles->statut }}</p>
                            <i class="fa-solid fa-location-dot me-2"></i>
                            <p class="text-sm">{{ $articles->localisation }}</p>
                            <p class="text-sm me-3">  Nombre de chambres: {{ $articles->nombreChambre ?? 'N/A' }}</p>
                            <p class="text-sm me-3">  Nombre de toilettes: {{ $articles->nombreToilette ?? 'N/A' }}</p>
                            <p class="text-sm me-3">  Nombre de balcons: {{ $articles->nombreBalcon ?? 'N/A' }}</p>
                            <p class="text-sm me-3">  Espaces verts: {{ $articles->espaceVert ?? 'N/A' }}</p>
                        </div>

                        <div class="d-flex justify-content-center align-items-center">
                            @if (Auth::user() && Auth::user()->id === $articles->user_id)
                                <a href="{{ '/article/modifier/' . $articles->id }}" class="btn btn-success me-3">Modifier
                                    Info Bien</a>
                                <a href="/articles/deletearticle/{{ $articles->id }}" class="btn btn-danger">Supprimer le
                                    Bien</a>
                            @endif

                            @if (isset($ok) && isset($commentaire) && $commentaire->user_id === Auth::user()->id)
                                <form action="{{ url('/articles/commentaireupdate/' . $commentaire->id) }}"
                                    class="comment_class" method="post">
                                    @csrf
                                    <input type="hidden" name="article_id" value="{{ $articles->id }}">
                                    <input type="hidden" name="id" value='{{ $commentaire->id }}'>
                                    <input type="text" class="input_comment" name="contenu"
                                        value="{{ $commentaire->contenu }}">
                                    <button type="submit" class="card__btn">Modifier</button>
                                </form>
                            @endif
                        </div>
                    </div>

                    <hr style="border: 2px solid black width:90%;" class="mx-5">
                    <h3 style="text-align: center">Chambres</h3>

                    <div class="row d-flex justify-content-center align-items-center mb-5">
                        @foreach ($articles->chambres  as $chambre)
                            <div class="col-md-10">
                                <div class="card mx-5 my-2">
                                    <div class="card-body d-flex justify-content"
                                        style="max-width: fit-content; overflow: auto;">
                                        <div>
                                            <div class="text mb-2 me-5">
                                                <img src="{{ asset('chambres/'.$chambre->image) }}"
                                                    alt="Image de la chambre" style="max-width: 500px ;max-heigth: 500px ;">
                                            </div>
                                            <div class="mb-2">
                                                <i class="fa-solid fa-info-circle me-2"></i>
                                                Type de chambre:
                                                {{ $chambre->typeChambre === 'simple' ? 'Chambre sans sallle de bain' : 'Chambre avec sallle de bain' }}
                                            </div>
                                            <div class="text mb-2">
                                                <i class="fa-solid fa-ruler me-2"></i>
                                                Dimension de la chambre: {{ $chambre->dimension ?? 'N/A' }} m²
                                            </div>
                                            <div>
                                                @if (Auth::user() && Auth::user()->id === $chambre->article->user_id)
                                                    <a href="/chambre/update/{{ $chambre->id }}"
                                                        class="btn btn-info me-3"style="font-size: 15px;"><i
                                                            class="fa-solid fa-pen-to-square icon-large"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <hr style="border: 2px solid black  width:90%;" class="mx-10">
                        <h3 style="text-align: center">Commentaires</h3>
                        <div class="row d-flex justify-content-center align-items-center mb-5">
                            @forelse ($articles->comments as $comment)
                                <div class="col-md-10 ">
                                    <div class="card mx-5 my-2">
                                        <div class="card-body d-flex justify-content"
                                            style="max-width: fit-content; overflow: auto;">
                                            <div>
                                                <div class="text mb-2 me-5"><i class="fa-solid fa-user me-2"></i> <b>
                                                        {{ $comment->user->name }} </b></div>
                                                <div class="mb-2"><i class="fa-solid fa-message me-2"></i>
                                                    {{ $comment->contenu }}</div>
                                                <div class="text mb-2"><i class="fa-solid fa-calendar me-2"></i>
                                                    {{ $comment->created_at }}</div>
                                            </div>
                                            <div>
                                                @if (Auth::user() && Auth::user()->id === $comment->user_id)
                                                    <a href="/articles/commentaire/{{ $comment->id }}"
                                                        class="btn btn-info me-3"style="font-size: 15px;"><i
                                                            class="fa-solid fa-pen-to-square icon-large"></i></a>
                                                @endif
                                                @if ((Auth::user() && Auth::user()->role_id === 2) || (Auth::user() && Auth::user()->id === $comment->user_id))
                                                    <a href="/articles/deletecommentaire/{{ $comment->id }}"
                                                        class="btn btn-danger" style="font-size: 15px; "><i
                                                            class="fa-solid fa-delete-left"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-muted ms-12 mb-5 mt-0">Aucun commentaire pour ce bien immobillier</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
