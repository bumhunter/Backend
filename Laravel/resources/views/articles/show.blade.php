@extends('layouts.app')

@section('page-title')
    Статья на сайте
@endsection

@section('content')
    <a href="/public/articles" class="btn btn-warning">Назад</a><br>

    <h1>{{ $article->title }}</h1>

    <div>
        <p>{!! $article->text !!}</p>
        <p>Дата создания: {{ $article->created_at }}</p>
    </div>
    @if(!Auth::guest())
        @if(Auth::user()->id == $article->user_id)
            <hr>
            <a href="/public/articles/{{$article->id}}/edit" class="btn btn-warning">Редактировать</a>

            <br><br>
            {!! Form::open(['action' => ['ArticlesController@destroy', $article->id], 'method' => 'POST']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Удалить запись', ['class' => 'btn btn-danger']) }}
            {!! Form::close() !!}
        @endif
    @endif
@endsection
