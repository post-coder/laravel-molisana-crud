<header class="text-center">
  {{-- logo --}}
  <img class="logo" src="{{ Vite::asset('resources/img/marchio-sito-test.png') }}" alt="Logo Molisana">

  {{-- navbar --}}
  <nav>
    <ul>
      <li>
        <a href="{{route('homepage')}}">Home</a>
      </li>
      <li class="active">
        <a href="{{route('pastas.index')}}">Prodotti</a> 
      </li>
      <li>
        News
      </li>
    </ul>
  </nav>
</header>