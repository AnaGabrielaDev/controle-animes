@extends ('layout')

@section ('title')
Animes
@endsection

@section('content')
<a href="/animes/create" class="btn btn-dark mb-2">Adcionar Anime</a>

<ul class="list-group">
    @foreach ($animes as $anime)
    <li class="list-group-item">{{ $anime->nome }}</li>
    @endforeach
</ul>
@endsection