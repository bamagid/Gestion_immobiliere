@extends('layouts.template')
@section('content')
@if (session('status'))
<div class="row d-flex justify-content-center align-items-center">
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
</div>
@endif
<form action="/chambres/ajouter" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container col-md-6 border">
        <h4 class="text-center">
            Ajout de chambres pour le bien immobilier {{$bien->nom}}
        </h4><br>
        @for ($i = 0; $i < $bien->nombreChambre; $i++)
        <div class="row ">
            <div class="input-group input-group-outline">
                <label class="form-label mb-2">Image</label>
                <input name="chambres[{{$i}}][image]" type="file" class="form-control mt-5">
            </div>
            <label class="form-label">Type de chambre </label>
            <div class="input-group input-group-outline my-3">
                <select style="width: 500px;" name="chambres[{{$i}}][statut]" class="pe-2 btn btn-sm btn-outline-primary "
                    aria-label="Default select example">
                    <option selected>Type de chambre</option>
                    <option value="simple">Sans salle de bain</option>
                    <option value="avecSalleDeBain">Avec salle de bain</option>
                </select>
            </div>
            </div>
            <label class="form-label ">Dimension de la chambre</label>
            <div class="input-group input-group-outline my-3">
                <input name="chambres[{{$i}}][dimension]" type="number" class="form-control" placeholder="Dimension de la chambre">
            </div>
            @endfor
            <div class="d-flex justify-content-center align-items-center">
                <input type="hidden" name="article_id" value="{{$bien->id}}">
                <button type="submit" class="btn  btn-primary " style="width: 300px;"> Ajouter</button>
            </div>
        </div>
    </div>
</form>
@endsection