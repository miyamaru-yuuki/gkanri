<?php

namespace App\Http\Controllers;

use App\Models\Game;
use DB;

class GameController extends Controller
{
    public function index()
    {
        $game = new Game();
        $gameData = $game
            ->all();

        return view('game.index', ['gameData' => $gameData]);
    }
}
