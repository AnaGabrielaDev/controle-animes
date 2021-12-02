@extends('layout')

@section('title')
Adicionar série
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="post">
        @csrf
        <div class="row">
            <div class="col col-2">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome">
            </div>

            <div class="col col-2">
                <label for="temporadas">Temporadas</label>
                <input type="number" class="form-control" name="temporadas" id="temporadas">
            </div>

            <div class="col col-2">
                <label for="episodios">Episodios</label>
                <input type="number" class="form-control" name="episodios" id="episodios">
            </div>
        </div>
        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>
@endsection