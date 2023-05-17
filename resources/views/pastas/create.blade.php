@extends('layouts.main')


@section('content')


<main>


  <form action="{{route('pastas.store')}}" method="POST">
    @csrf

    <div class="mb-3">
      <label for="title">Titolo</label>
      <input class="form-control" type="text" id="title" name="title">
    </div>

    <div class="mb-3">
      <label for="description">Descrizione</label>
      <textarea class="form-control" id="description" name="description"></textarea>
    </div>

    <div class="mb-3">
      <label for="type">Tipo</label>
      <input class="form-control" type="text" id="type" name="type">
    </div>

    <div class="mb-3">
      <label for="src">Link immagine</label>
      <input class="form-control" type="text" id="src" name="src">
    </div>

    <div class="mb-3">
      <label for="cooking_time">Tempo di cottura</label>
      <input class="form-control" type="text" id="cooking_time" name="cooking_time">
    </div>

    <div class="mb-3">
      <label for="weight">Peso</label>
      <input class="form-control" type="text" id="weight" name="weight">
    </div>

    <button class="btn btn-primary" type="submit">Aggiungi</button>
  </form>

</main>


@endsection