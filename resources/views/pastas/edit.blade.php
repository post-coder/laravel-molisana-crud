@extends('layouts.main')


@section('content')

<div class="container">


  <form action="{{route('pastas.update', $pasta->id)}}" method="POST">
    @csrf
    {{-- dobbiamo aggiungere questa riga per specificare il metodo che dobbiamo utilizzare con laravel per mandare la richiesta --}}
    @method('PUT')

    <div class="mb-3">
      <label for="title">Titolo</label>
      <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{old('title') ?? $pasta->title}}">
      @error('title')
        {{-- 
          in automatico ci fornisce una variabile stringa con il messaggio di errore del campo specificato 
          la variabile si chiama esattamente $message
        --}}
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="description">Descrizione</label>
      <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description') ?? $pasta->description}}</textarea>
      @error('description')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="type">Tipo</label>
      <input class="form-control @error('type') is-invalid @enderror" type="text" id="type" name="type" value="{{old('type') ?? $pasta->type}}">
      @error('type')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="src">Link immagine</label>
      <input class="form-control @error('src') is-invalid @enderror" type="text" id="src" name="src" value="{{old('src') ?? $pasta->src}}">
      @error('src')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="cooking_time">Tempo di cottura</label>
      <input class="form-control @error('cooking_time') is-invalid @enderror" type="text" id="cooking_time" name="cooking_time" value="{{old('cooking_time') ?? $pasta->cooking_time}}">
      @error('cooking_time')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="weight">Peso</label>
      <input class="form-control @error('weight') is-invalid @enderror" type="text" id="weight" name="weight" value="{{old('weight') ?? $pasta->weight}}">
      @error('weight')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <button class="btn btn-primary" type="submit">Salva</button>
  </form>

</div>


@endsection