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
    <li class="list-group-item d-flex justify-content-between align-items-center">
        {{ $anime->nome }}

        <span class="d-flex">
            <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{$anime->id}})">
                <i class="bi bi-check-lg"></i>
            </button>

            <a href="/animes/{{ $anime->id }}/temporadas" class="btn btn-info mx-2">
                <i class="bi bi-pen"></i>
            </a>
        

            <form method="post" action="/animes/remove/{{$anime->id}}" onsubmit="return confirm ('Tem certeza que deseja excluir? {{$anime->nome}}')">
                @csrf
                <button class="btn btn-danger mx-2">
                    <i class="bi bi-trash"></i>
                </button>
            </form>
        </span>

    </li>

    @endforeach
</ul>
@endsection