@section('content')

<div class="row row-cols-1 row-cols-md-4 w-100">
    @foreach($games as $game)
    <div class="col mb-4">
        <div class="card">
            <img src="/pictures/{{$game->picture}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$game->title}}</h5>
                <p class="card-text">{{$game->desc}}</p>
                <h4><span class="badge badge-secondary">{{$game->genre}}</span></h4>

                @if($game->fsk == 18)
                <h4><span class="badge badge-danger">{{$game->fsk}}</span></h4>
                @else
                <h4><span class="badge badge-success">{{$game->fsk}}</span></h4>
                @endif

                <h4><span class="badge badge-success">{{$game->platform}}</span></h4>
                <p class="card-text">{{$game->price}}</p>
                <a class="btn btn-success" href="#" role="button">Zur Händlerseite</a>
                <p class="card-text">'Rating: {{$game->rating}} von 5 Sternen'</p>
                <p class="card-text">Release Datum: {{$game->release}}</p>

                @if(Auth::check())
                <a class="btn btn-primary" href="{{route('games.edit', $game->id) }}">Bearbeiten</a>
                <form action="{{route('games.destroy', $game->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Löschen</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection