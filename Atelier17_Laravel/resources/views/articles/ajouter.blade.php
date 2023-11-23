@extends('layouts.template')
@section('content')
@if (session('status'))
<div class="row d-flex justify-content-center align-items-center">
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
</div>
@endif
    <form action="/addarticle" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container col-md-6 border">
            <h4 class="text-center">
                Ajouter un nouveau Bien Immobillier <br> (Appartement, Maison, Studio ...)
            </h4>
            <div class="row ">
                <div class="input-group input-group-outline my-3">
                    <label class="form-label">Nom</label>
                    <input name="nom" type="text" class="form-control">
                </div>
                <div class="input-group input-group-outline my-3">
                    <select style="width: 500px;" name="categorie" class="pe-2 btn btn-sm btn-outline-primary "
                        aria-label="Default select example">
                        <option selected>Catégorie</option>
                        <option value="luxe">Luxe</option>
                        <option value="moyen">Moyen</option>
                        <option value="abordable">Abordable</option>
                    </select>
                </div>
                <div class="input-group input-group-outline">
                    <label class="form-label mb-2">Image</label>
                    <input type="file" name="image" class="form-control mt-5">
                </div>
                <div class="input-group input-group-outline my-2">
                    <textarea name="description" type="text" class="form-control" rows="3" placeholder="Description"></textarea>
                </div>
                <div class="input-group input-group-outline my-3">
                    <label class="form-label">Localisation</label>
                    <input name="localisation" type="text" class="form-control">
                </div>
                <div class="input-group input-group-outline my-3">
                    <select style="width: 500px;" name="statut" class="pe-2 btn btn-sm btn-outline-primary "
                        aria-label="Default select example">
                        <option selected>Statut</option>
                        <option value="Disponible">Disponible</option>
                        <option value="Occupé">Occupé</option>
                    </select>
                </div>
                <div class="input-group input-group-outline my-3">
                    <select style="width: 500px;" name="espace_vert" class="pe-2 btn btn-sm btn-outline-primary "
                        aria-label="Default select example">
                        <option selected>Espace_vert</option>
                        <option value="Oui">Oui</option>
                        <option value="Non">Non</option>
                    </select>
                </div>
                <div class="input-group input-group-outline my-3">
                    <label class="form-label">Dimension</label>
                    <input name="dimension" type="text" class="form-control">
                </div>
                <div class="input-group input-group-outline my-3">
                    <select style="width: 500px;" name="balcons" class="pe-2 btn btn-sm btn-outline-primary "
                        aria-label="Default select example">
                        <option selected>Balcons</option>
                        <option value="Oui">Oui</option>
                        <option value="Non">Non</option>
                    </select>
                </div>
                <div class="input-group input-group-outline my-3">
                    <label class="form-label">Nombre_de_chambre</label>
                    <input name="nombre_de_chambre" type="text" class="form-control">
                </div>
                <div class="input-group input-group-outline my-3">
                    <label class="form-label">Nombre_de_toilette</label>
                    <input name="nombre_de_toilette" type="text" class="form-control">
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn  btn-primary " style="width: 300px;">Enregistrer</button>
                </div>
            </div>
        </div>

    </form>
@endsection
