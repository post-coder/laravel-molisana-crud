@extends('layouts/main')


@section('content')

<main class="text-center">
  <img src="{{$pasta->src}}" alt="immagine della pasta">

  <hr>

  <h1>{{$pasta->title}}</h1>

  <ul class="text-left">
    <li>
      Tipo: {{$pasta->type}}
    </li>
    <li>
      Tempo di cottura: {{$pasta->cooking_time}}
    </li>
    <li>
      Peso: {{$pasta->weight}}
    </li>
  </ul>

  <p>
    {{$pasta->description}}
  </p>
</main>

@endsection