@extends('layouts')
@section('title', 'Проекты')

@section('content')
    <div class="ui segment container form">
        <div class="inline fields">
            <div class="field">
                <input type="text" id="name-project" placeholder="Название проекта">
            </div>
            <div class="field">
                <button class="ui button" id="create-button">Создать</button>
            </div>
        </div>
    </div>

    <div class="ui grid container">
        @foreach($projects as $project)
            <div class="four wide column">{{ $project->name }}</div>
        @endforeach
    </div>
@endsection
