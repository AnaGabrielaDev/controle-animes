@extends ('layout')

@section ('title')
Animes
@endsection

@section('content')

@if(!empty($message))
<div class="alert alert-success">
{{$message}}
</div>
@endif

<a href="/animes/create" class="btn btn-dark mb-2">Adicionar Anime</a>

<ul class="list-group">
    @foreach ($animes as $anime)
    <li class="list-group-item">
        {{ $anime->nome }}

        <span class="d-flex">
            <a href="/animes/{{ $anime->id }}/temporadas" class="btn btn-info btn-sm mr-1">
                <i class="fas fa-external-link-alt"></i>
            </a>
        

            <form method="post" action="/animes/remove/{{$anime->id}}" onsubmit="return confirm ('Tem certeza que deseja excluir? {{$anime->nome}}')">
                @csrf
                <button class="btn btn-danger">
                    excluir
                </button>
            </form>
        </span>

    </li>

    @endforeach
</ul>
@endsection