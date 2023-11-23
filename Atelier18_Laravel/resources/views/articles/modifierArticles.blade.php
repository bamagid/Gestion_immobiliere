@extends('layouts.template')
@section('content')
@if (session('status'))
<div class="row d-flex justify-content-center align-items-center">
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
</div>
@endif
    <form action="{{ '/articles/modifierArticle/ ' . $article->id }}"method="post" enctype="multipart/form-data">
        @csrf
        <div class="container col-md-6 border">
            <h4 class="text-center">
                Modifier Informations " {{ $article->nom }} "  <br>
            </h4>
            <div class="row ">
                <div class="input-group input-group-outline my-3">
                    <label class="form-label">Nom</label>
                    <input name="nom" value="{{ $article->nom }}"type="text" class="form-control">
                </div>

                <div class="input-group input-group-outline my-3">
                    <select style="width: 500px;" value="{{ $article->categorie }}" name="categorie"
                        class="pe-2 btn btn-sm btn-outline-primary " aria-label="Default select example">
                        <option value="luxe">Luxe</option>
                        <option value="moyen">Moyen</option>
                        <option value="abordable">Abordable</option>
                    </select>
                </div>
                <div class="input-group input-group-outline">
                    <label class="form-label">image</label>
                    <input name="image" value="{{ $article->image }}"type="file" class="form-control mt-5">
                </div>
                <div class="input-group input-group-outline my-2">
                    <textarea name="description" type="text" class="form-control" rows="3" placeholder="Description">{{ $article->description }}</textarea>
                </div>
                <div class="input-group input-group-outline my-3">
                    <label class="form-label">Localisation</label>
                    <input name="localisation" value="{{ $article->localisation }}" type="text" class="form-control">
                </div>
                <div class="input-group input-group-outline my-3">
                    <select style="width: 500px;" name="statut" class="pe-2 btn btn-sm btn-outline-primary"
                        aria-label="Default select example">
                        <option selected value="{{ $article->statut }}">{{ $article->statut }}</option>

                        <option value="disponible">disponible</option>
                        <option value="occupé">occupé</option>

                    </select>
                </div class="d-flex justify-content-center align-items-center">
                <input type="hidden" value="{{ $article->id }}" name="id">
                <button type="submit" class="btn btn-primary ms-7 "style="width: 300px;">Modifier</button>
            </div>
        </div>

    </form>
@endsection
