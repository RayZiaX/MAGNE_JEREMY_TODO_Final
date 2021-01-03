@extends('layouts.main')

@section('title', "Board's tasks")


@section('content')
    <h2>{{$board->title}}</h2>
    <h3>Liste des tâches</h3>
        @if(count($board->tasks ) == 0)
            <a href="{{route('tasks.create', $board)}}">Veuillez entrez une task</a>
        @else
            <a href="{{route('tasks.create', $board)}}">Ajouter une task</a>
            @foreach ($board->tasks as $task)
            <p>{{ $task->title }}. 
                <a href="{{route('tasks.show', [$board, $task])}}">detail</a> <a href="{{route('tasks.edit', [$board, $task])}}">edit</a></p>
                <form action="{{route('tasks.destroy', [$board, $task])}}" method='POST'>
                    @method('DELETE')
                    @csrf
                    
                    <button type="submit">Delete</button>
                </form>
            @endforeach
        @endif
        <br>
        <a href="{{route('boards.show', $board)}}">retour</a>

@endsection