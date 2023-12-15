@extends('layouts.template')
@section('content')
    <div class="row mt-2">
        @foreach ($articles as $article)
            <div class="col-lg-6 mt-4 mb-4">
                <div class="card z-index-4" style="height:auto;">
                    <div
                        class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent
                                        d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/' . $article->image) }}"
                            style="width: 100%; height: 350px; object-fit: cover;object-position: center center;"
                            alt="image de l'article">
                    </div>
                    <div class="card-body" style="overflow: hidden;">
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
                                <a href="/articles/{{ $article->id }}" class="btn btn-success me-3">voir plus</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        @endforeach
    </div>
    {{ $articles->links() }}
@endsection
