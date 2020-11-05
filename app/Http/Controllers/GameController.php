<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\Response;


class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();

        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

   
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|min:2|max:50',
            'picture'=>'required|image|max:2048',
            'desc' => 'required|string|max:255',
            'genre' => 'required|string|max:25',
            'fsk' => 'required|string|max:2',
            'platform' => 'required|string|min:2|max:25',
            'price' => 'required|numeric',
            'rating' => 'numeric',
            'release' => 'date',

        ]);

        $pictureFile = $request->file('picture');
        $pictureExt = $pictureFile->getClientOriginalExtension();
        $newPictureName = rand(123456,999999).".".$pictureExt;
        $destinationPath = public_path('/pictures');
        $pictureFile->move($destinationPath, $newPictureName);

        $game = new game;
        $game->picture = $newPictureName;

        $formData = array(
            'title' => $request->title,
            'picture'=> $newPictureName,
            'desc' => $request->desc,
            'genre' => $request->genre,
            'fsk' => $request->fsk,
            'platform' => $request->platform,
            'price' => $request->price,
            'rating' => $request->rating,
            'release' => $request->release,
        );

        Game::create($formData);

        return redirect('/index')->with('success', 'Spiel erfolgreich hinzugefügt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
