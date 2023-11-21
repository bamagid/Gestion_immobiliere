@extends('layouts.template')
@section('content')
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
                        <div class="mt-3 d-flex justify-content-center align-items-center">
                            <a href="/articles/{{ $article->id }}" class="btn btn-primary me-3">voir plus</a>
                            <a href="#" class="btn btn-secondary me-3">Commenter</a>
                        </div>
                    </div>

                </div>

            </div>
        @endforeach
        {{ $articles->links() }}
    </div>
@endsection
