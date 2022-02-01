@extends('layouts.app')

@section('page-title')
    {{ $header }}
@endsection

@section('content')
    <div class="jumbotron text-center">
        <h1>Главная страница</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Beatae consequatur cum, debitis ducimus error esse ex facilis ipsum maiores,
            molestiae mollitia nam quas qui quia quisquam ratione rem voluptas voluptatem.</p>
        <button class="btn btn-warning">Зарегистрироваться</button>
    </div>
@endsection
