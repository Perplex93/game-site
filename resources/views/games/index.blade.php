@extends('layout')

@section('title', 'Spiele Index') 
@section('content')

<div class="mt-5">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div>
    @endif
</div>

<div class="row row-cols-1 row-cols-md-4 w-100">
    @foreach($games as $game)
    <div class="col mb-4">
        <div class="card">
            <img src="/pictures/{{$game->picture}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$game->title}}</h5>
                <a class="btn btn-primary" href="{{route('games.edit', $game->id) }}">Bearbeiten</a>
                <form action="{{route('games.destroy', $game->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Löschen</button>
                   
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection 
@if(Auth::check())
@endif