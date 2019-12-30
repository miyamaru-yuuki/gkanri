<?php

namespace App\Http\Controllers;

use App\Models\Game;
//use App\Models\Maker;
use DB;

class GameController extends Controller
{
    public function index()
    {
        $game = new Game();
        $gameData = $game
            ->join('maker', 'maker.mid', '=', 'game.mid')
            ->get();

        return view('game.index', ['gameData' => $gameData]);
    }
}
