@extends('layouts.app')

@section('page-title')
    {{ $title }}
@endsection

@section('content')
    <h1>Страница про нас</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda debitis et expedita, ipsa labore,
        laborum magni molestias nihil nisi officiis optio, placeat veniam! Deserunt earum eos itaque quisquam quod!</p>

    @if(count($params) > 0)
        <ul class="list-group">
            @foreach($params as $el)
                <li class="list-group-item">{{ $el }}</li>
            @endforeach
        </ul>
    @endif
@endsection
