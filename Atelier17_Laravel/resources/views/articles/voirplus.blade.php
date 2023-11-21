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
                <img src="{{asset('images/'.$article->image)}}" style="width: 600px" alt="image de l'article">
               </div>
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
              <a href="{{'/article/modifier/'.$article->id}}" class="badge rounded-pill bg-dark">modifier</a>
              <a href="#" class="badge rounded-pill bg-primary">supprimer</a>
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