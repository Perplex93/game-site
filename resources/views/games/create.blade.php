@extends('layout')
@section('title', 'Create Game')
@section('content')

    <div class="card mt-5">
        <div class="card-header">
            Add a Game
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('games.store')}}" method="post"  enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Game Name</label>
                    <input type="string" class="form-control" name="title"/>
                </div>
                <div class="form-group">
                    <label for="picture">Game Bild</label>
                    <input type="file" class="form-control" name="picture" accept="image/jpg,image/jpeg,image/png"/>
                </div>
                <div class="form-group">
                    <label for="desc">Game Beschreibung</label>
                    <textarea name="desc" cols="6" rows="6" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="genre">Game Genre</label>
                    <input type="text" class="form-control" name="genre"/>
                </div>
                <div class="form-group">
                    <label for="fsk">Game FSK</label>
                    <input type="text" class="form-control" name="fsk"/>
                </div>
                <div class="form-group">
                    <label for="platform">Game Plattform</label>
                    <input type="text" class="form-control" name="platform"/>
                </div>
                <div class="form-group">
                    <label for="price">Game Preis</label>
                    <input type="number" use step="0.01" class="form-control" name="price"/>
                </div>
                <div class="form-group">
                    <label for="rating">Game Rating</label>
                    <input type="number" class="form-control" name="rating"/>
                </div>
                <div class="form-group">
                    <label for="release">Game Release</label>
                    <input type="date" class="form-control" name="release"/>
                </div>
                <button type="submit" class="btn btn-outline-primary">Game hinzufügen</button>
            </form>
        </div>
    </div>
@endsection