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
            <div class="input-group input-group-outline my-3">
              <label class="form-label">image</label>
              <input name="image" type="text" class="form-control">
            </div>
            <div class="input-group input-group-outline my-3">
              <textarea name="description" type="text" class="form-control" rows="3" placeholder="Description"></textarea>
            </div>
            <div class="input-group input-group-outline my-3">
              <label class="form-label">Localisation</label>
              <input name="localisation" type="text" class="form-control">
            </div>
            <div class="input-group input-group-outline my-3">
            <select name="statut" class="form-select btn btn-outline-primary dropdown-toggle" aria-label="Default select example">
                {{-- <option selected>Statut</option> --}}
                <option value="disponible">disponible</option>
                <option value="occupé">occupé</option>
              </select>
            </div>
            
            <button type="submit" class="btn btn-primary ">Enregistrer</button>
        </div>
    </div>
   
</form>

@endsection