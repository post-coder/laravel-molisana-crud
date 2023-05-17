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

  <hr class="my-4">

  <div class="row">
    <div class="col-6">
      <a href="{{route('pastas.edit', $pasta->id)}}">Modifica la pasta</a>
    </div>
    <div class="col-6">

      <form action="{{route('pastas.destroy', $pasta->id)}}" method="POST">
        @csrf
        @method('DELETE')

        <button class="btn btn-danger" type="submit">CANCELLA</button>
      </form>

    </div>
  </div>

</main>

@endsection