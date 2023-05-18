@extends('layouts.main')


@section('content')


<main>
  @if($errors->any()) 

    <div class="alert alert-danger" role="alert">
      <ul>
        
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
          
      </ul>
    </div>
      

  
  @endif




  <form action="{{route('pastas.store')}}" method="POST">
    @csrf

    <div class="mb-3">
      <label for="title">Titolo</label>

      {{-- queste informazioni di validazione sono in base agli strumenti forniti da boostrap (classi). Nulla ci vieta di crearle da zero customizzate --}}
      <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{old('title')}}">
      
      {{-- se c'è un errore nel campo specificato come parametro, allora mostra il contenuto --}}
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
      <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" >{{old('description')}}</textarea>

      @error('description')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="type">Tipo</label>
      <input class="form-control @error('type') is-invalid @enderror" type="text" id="type" name="type"  value="{{old('type')}}">
      @error('type')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="src">Link immagine</label>
      <input class="form-control @error('src') is-invalid @enderror" type="text" id="src" name="src"  value="{{old('src')}}">
      @error('src')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="cooking_time">Tempo di cottura</label>
      <input class="form-control @error('cooking_time') is-invalid @enderror" type="text" id="cooking_time" name="cooking_time" value="{{old('cooking_time')}}">
      @error('cooking_time')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="weight">Peso</label>
      <input class="form-control @error('weight') is-invalid @enderror" type="text" id="weight" name="weight"  value="{{old('weight')}}">
      @error('weight')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <button class="btn btn-primary" type="submit">Aggiungi</button>
  </form>

</main>


@endsection