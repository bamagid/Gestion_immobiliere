@extends('layouts.template')
@section('content')
    @if (session('statut'))
        <div class="alert alert-success">
            {{ session('statut') }}
        </div>
    @endif
    <div class="container">
        <div class="row mt-5 d-flex justify-content-center align-items-center">
            <div class="col-lg-6 mt-4 mb-4 ">
                <div class="card z-index-2" style="height:50vh;">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <img src="{{ asset('images/' . $article->image) }}" style="width: 600px" alt="image de l'article">
                        <div class="card-body">
                            <h6 class="mb-0 ">{{ $article->nom }}</h6>
                            <p class="text-sm ">{{ $article->description }}</p>

                            <hr class="dark horizontal">
                            <div class="d-flex">
                                <i class="material-icons text-sm my-auto mt-1 me-2">schedule</i>
                                <p class="text-sm"> {{ $article->statut }} </p>
                            </div>
                            <div class="mt-7 d-flex justify-content-center align-items-center">
                                <a href="{{ '/article/modifier/' . $article->id }}"
                                    class="btn btn-primary me-3">modifier</a>
                                <a href="/articles/deletearticle/{{ $article->id }}"
                                    class="btn btn-primary">Supprimer</a>
                            </div>
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
