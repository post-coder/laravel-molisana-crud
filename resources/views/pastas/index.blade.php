@extends('layouts/main')

@section('content')

<main class="pasta-list">

  <div class="row">
  
    @foreach ($pastas as $singlePasta)
      <div class="col-4 pasta-card">
  
        <a href="{{route('pastas.show', $singlePasta->id)}}" class="pasta-card-inner">
          <img src="{{$singlePasta->src}}" alt="immagine pasta">
          {{$singlePasta->title}}
        </a>
      </div>
    @endforeach
  
  </div>

</main>


<section>
  <a href="{{route('pastas.create')}}">Aggiungi un tipo di pasta</a>
</section>


@endsection