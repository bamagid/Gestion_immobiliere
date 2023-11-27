@extends('layouts.template')
@section('content')
@if (session('status'))
<div class="row d-flex justify-content-center align-items-center">
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
</div>
@endif
    <form action="{{$ok==='ok' ? "/articles/modifierArticle/$articles->id" : "/addarticle"}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container col-md-6 border">
            <h4 class="text-center">
                {{$ok==='ok' ? "Modifier Informations $articles->nom " : "Ajouter un nouveau Bien Immobillier  (Appartement, Maison, Studio ...)"}} <br>
            </h4>
            <div class="row ">
                <label class="form-label mb-2">Nom du bien immobilier</label>
                <div class="input-group input-group-outline my-3">
                    <input name="nom" type="text" class="form-control" placeholder="Nom du bien immobilier"  value="{{ $ok==='ok' ? "$articles->nom" : '' }}">
                </div>
                <label class="form-label ">Catégorie</label>
                <div class="input-group input-group-outline my-3">
                    <select style="width: 500px;" name="categorie" class="pe-2 btn btn-sm btn-outline-primary "
                        aria-label="Default select example">
                        <option selected>{{$ok==='ok' ? "$articles->categorie": "Catégorie" }}</option>
                        <option value="luxe">Luxe</option>
                        <option value="moyen">Moyen</option>
                        <option value="abordable">Abordable</option>
                    </select>
                </div>
                <div class="input-group input-group-outline">
                    <label class="form-label mb-2">Image</label>
                    <input type="file" name="image" class="form-control mt-5">
                </div>
                <label class="form-label">Description </label>
                <div class="input-group input-group-outline my-2">
                    
                    <textarea name="description" type="text" class="form-control" rows="3" placeholder="Description"> {{$ok==='ok' ? "$articles->description" : '' }}</textarea>
                </div>
                <label class="form-label">Localisation </label>
                <div class="input-group input-group-outline my-3">
                    <input name="localisation" type="text" class="form-control" placeholder="Localisation" value="{{ $ok==='ok' ? "$articles->localisation" : '' }}">
                </div>
                <label class="form-label ">Statut </label>
                <div class="input-group input-group-outline my-3">
                    <select style="width: 500px;" name="statut" class="pe-2 btn btn-sm btn-outline-primary "
                        aria-label="Default select example">
                        <option selected>{{ $ok==='ok' ? $articles->statut : "Statut" }}</option>
                        <option value="Disponible">Disponible</option>
                        <option value="Occupé">Occupé</option>
                    </select>
                </div>
                <label class="form-label" >Espace vert</label>
                <div class="input-group input-group-outline my-3">
                    <select style="width: 500px;" name="espaceVert" class="pe-2 btn btn-sm btn-outline-primary "
                        aria-label="Default select example">
                        <option selected> {{ $ok==='ok' ? "$articles->espaceVert" : "Espace vert"}}</option>
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                    </select>
                </div>
                <label class="form-label ">Dimension du bien Immobillier</label>
                <div class="input-group input-group-outline my-3">
                    <input name="dimension" type="number" class="form-control" placeholder="Dimension du bien Immobillier" value="{{$ok==='ok' ? "$articles->dimension" : '' }}">
                </div>
                <label class="form-label">Nombre de balcon</label>
                <div class="input-group input-group-outline my-3">
                    <input name="nombreBalcon" type="number" class="form-control" placeholder="Nombre de balcon" value="{{$ok==='ok' ? "$articles->nombreBalcon" : '' }}">
                </div>
               
                <label class="form-label">Nombre de chambre</label>
                <div class="input-group input-group-outline my-3">
                    <input name="nombreChambre" type="number" class="form-control" placeholder="Nombre de chambre" value="{{$ok==='ok' ? "$articles->nombreChambre" : '' }}">
                </div>
                <label class="form-label">Nombre de toilette </label>
                <div class="input-group input-group-outline my-3">
                    <input name="nombreToilette" type="text" class="form-control" placeholder="Nombre de toilette"  value="{{$ok==='ok'? "$articles->nombreToilette" : '' }}">
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn  btn-primary " style="width: 300px;">{{$ok==='ok' ? "Modifier" : "Ajouter"}}</button>
                </div>
            </div>
        </div>

    </form>
@endsection
