@extends('layouts.template')
@section('content')
@if(session('statut'))
    <div class="alert alert-success">
        {{ session('statut') }}
    </div>
@endif

<div class="row   mt-2" >

    <div class="col-lg-6 mt-4 mb-4 " >
     
      <div class="card z-index-2" style="height:60vh;">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
          <div class="bg-gradient-primary  shadow-primary border-radius-lg py-3 pe-1" >
            <div class="chart">
              <canvas id="chart-bars" class="chart-canvas" height="200"></canvas>
            </div>
          </div>
        </div>
        <div class="card-body">
       
           
          <h6 class="mb-0 ">{{$article->nom}}</h6>
          <p class="text-sm ">{{$article->description}}</p>
         
          <hr class="dark horizontal">
          <div class="d-flex ">
            <i class="material-icons text-sm my-auto me-1">schedule</i>
            <p class="mb-0 text-sm"> {{$article->statut}} </p>
            <div >
              <a href="{{'/article/modifier/'.$article->id}}" class="badge rounded-pill bg-primary">modifier</a>
              <form action="{{'/articles/deletearticle/'.$article->id}}" method="post">
                @csrf 
                @method('delete')
                <button class="badge rounded-pill bg-dark" type="submit">Supprimer</button>
              </form>
            </div>
          </div>
            </div>
          </div>
        </div>
      </div>

      <div>
        @forelse ($article->comments as $comment)
          {{$comment->contenu}}
          @foreach ($comment->user as $user)
          {{$user->name}}
      @endforeach
      <form action="" method="post"></form>
      <button></button>
        @empty
          pas de commentaire pour cet article  
        @endforelse
      </div>

@endsection