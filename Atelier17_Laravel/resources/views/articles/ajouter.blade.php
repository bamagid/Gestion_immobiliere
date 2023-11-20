@extends('layouts.template')
@section('content')

<form action="/addarticle" method="POST">
    @csrf 
    <div class="container col-md-8 border">
        <h4 class="text-center"> 
            Ajouter un nouveau Bien Immobillier <br> (Appartement, Maison, Studio ...)
        </h4>
        <div class="row ">
            <div class="input-group input-group-outline my-3">
              <label class="form-label">Nom</label>
              <input name="nom" type="text" class="form-control">
            </div>
            {{-- <div class="input-group input-group-outline my-3">
              <label class="form-label">Catégorie</label>
              <input name="categorie" type="text" class="form-control">
            </div> --}}
            <div class="input-group input-group-outline">
              <label class="form-label mb-3" >Image</label>
			        <input type="file" name="image" class="form-control mt-5">
            </div>
            <div class="input-group input-group-outline my-3">
              <textarea name="description" type="text" class="form-control" rows="3" placeholder="Description"></textarea>
            </div>
            <div class="input-group input-group-outline my-3">
              <label class="form-label">Localisation</label>
              <input name="localisation" type="text" class="form-control">
            </div>
            <div class="input-group input-group-outline my-3">
            <select name="statut" class="pe-2 btn btn-sm btn-secondary " aria-label="Default select example">
                <option selected>Statut</option>
                <option value="disponible">disponible</option>
                <option value="occupé">occupé</option>
              </select>
            </div>
            <div class="d-flex justify-content-center align-items-center">
            <button type="submit" class="btn  btn-primary " style="width: 300px;">Enregistrer</button>
        </div>
        </div>
    </div>
   
</form>

@endsection