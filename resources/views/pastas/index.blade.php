@extends('layouts/main')

@section('content')


<div class="pasta-list">

  <div class="row">
  
    @foreach ($pastas as $singlePasta)
      <div class="col-4 pasta-card">
  
        <a href="{{route('pastas.show', $singlePasta->id)}}" class="pasta-card-inner">

          <img src="{{$singlePasta->src}}" alt="immagine pasta">
          <span>{{$singlePasta->title}}</span>

        </a>
      </div>
    @endforeach
  
  </div>

</div>



<section class="actions">
  <a href="{{route('pastas.create')}}">Aggiungi un tipo di pasta</a>
</section>


@endsection