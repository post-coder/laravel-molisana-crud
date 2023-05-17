@extends('layouts.main')


@section('content')

<div class="container">


  <form action="{{route('pastas.update', $pasta->id)}}" method="POST">
    @csrf
    {{-- dobbiamo aggiungere questa riga per specificare il metodo che dobbiamo utilizzare con laravel per mandare la richiesta --}}
    @method('PUT')

    <div class="mb-3">
      <label for="title">Titolo</label>
      <input class="form-control" type="text" id="title" name="title" value="{{$pasta->title}}">
    </div>

    <div class="mb-3">
      <label for="description">Descrizione</label>
      <textarea class="form-control" id="description" name="description">
        {{$pasta->description}}
      </textarea>
    </div>

    <div class="mb-3">
      <label for="type">Tipo</label>
      <input class="form-control" type="text" id="type" name="type" value="{{$pasta->type}}">
    </div>

    <div class="mb-3">
      <label for="src">Link immagine</label>
      <input class="form-control" type="text" id="src" name="src" value="{{$pasta->src}}">
    </div>

    <div class="mb-3">
      <label for="cooking_time">Tempo di cottura</label>
      <input class="form-control" type="text" id="cooking_time" name="cooking_time" value="{{$pasta->cooking_time}}">
    </div>

    <div class="mb-3">
      <label for="weight">Peso</label>
      <input class="form-control" type="text" id="weight" name="weight" value="{{$pasta->weight}}">
    </div>

    <button class="btn btn-primary" type="submit">Salva</button>
  </form>

</div>


@endsection