@extends('layouts.template')
@section('content')
    <div class="container m-4">
        <div class="row d-flex justify-content-center align-items-center">
          <div>
            <h1 class="ms-10">
                Bienvenue sur JYM Immo
            </h1>
        </div>
            <div>
              {{-- {{asset('/assets/css/nucleo-icons.css')}} --}}
              <img src="{{asset('jym_immob-removebg.png')}}" alt="Image de JYM Immo" width="1000px">
            </div>
        </div>
    </div>
@endsection
