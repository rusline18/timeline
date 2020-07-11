@extends('layouts')
@section('title', 'Труднозатраты')

@section('content')
<div class="ui container">
    <h1 class="ui center aligned header">Труднозатраты на {{ date('d.m.Y') }}</h1>
</div>
<div class="ui container form segment">
    <div class="inline fields">
        <div class="four wide field">
            <label>Выберите дату</label>
            <input type="date" class="input" value="{{ date('Y-m-d') }}">
        </div>

        @if(count($projects) > 0)
            <div class="three wide field">
                    <select name="project" id="project-select" class="ui fluid selection dropdown">
                        @foreach($projects as $project)
                            <option value="{{ $project->id }}" @if($activeProject->id == $project->id) selected @endif>{{ $project->name }}</option>
                        @endforeach
                    </select>
            </div>
        @endif

        <div class="two wide field">
            <button class="ui button">Выбрать</button>
        </div>
    </div>

</div>
<div class="ui container segment">
    <div class="field ui action input fluid">
        <input type="text" name="task" placeholder="Название задачи" data-project="{{ $activeProject->id }}" id="task-input">
        <button class="ui button" id="create-task">
            Отправить
        </button>
    </div>
</div>
<div class="ui container list">
    @foreach($activeProject->tasks as $task)
        <div class="item">
            <h3 class="ui dividing header content">
                {{ $task->name }}
            </h3>
            <button class="ui green basic icon button play-task @if($task->isStart(true) != 0) hidden @endif" data-id="{{ $task->id }}">
                <i class="play icon"></i>
            </button>
            <div class="ui action input @if($task->isStart(true) == 0) hidden @endif">
                <input type="text" placeholder="Что сделано">
                <button class="ui red basic icon button stop-task" data-id="{{ $task->id }}">
                    <i class="pause icon"></i>
                </button>
            </div>

            @foreach($task->timesTask['model'] as $time)
                <div class="ui bulleted list">
                    @if(!empty($time->text))
                        <div class="item">{{ $time->text }} {{ $time->time }}</div>
                    @endif
                </div>
            @endforeach
            <div class="ui feed">
                <div class="event">
                    <div class="content">
                        <div class="summary">
                            Итого
                            <div class="date">
                                {{ $task->timesTask['total'] }} часов
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>
@endsection
