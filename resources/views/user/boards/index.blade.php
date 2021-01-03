@extends('layouts.main')

@section('title', "User's board")


@section('content')
    @if(count($boards) == 0)
        <p>Vous n'avez aucun board</p>
        <a href="{{route('boards.create')}}">Veuillez créer un boards</a>
    @else
        <p>Il faut parcourir et afficher tous le boards. </p>
        <a href="{{route('boards.create')}}">Ajouter un nouveau board</a>
    @endif
    @foreach ($boards as $board)
        <p>This is board {{ $board->title }}. 
            @can('view', $board)
            <a href="{{route('boards.show', $board)}}">detail</a> 
            @endcan
            @can('update', $board)
            <a href="{{route('boards.edit', $board)}}">edit</a></p></p>
            @endcan
            @can('delete', $board)
            <form action="{{route('boards.destroy', $board->id)}}" method='POST'>
                @method('DELETE')
                @csrf
                
                <button type="submit">Delete</button>
            </form>
            @endcan
    @endforeach
@endsection