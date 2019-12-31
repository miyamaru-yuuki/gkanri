<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function searchnumber(Request $request)
    {
        $playersnumber = $request->query('playersnumber');

        $game = new Game();
        $gameData = $game
            ->join('maker', 'maker.mid', '=', 'game.mid')
            ->where('playersnumbermin', '<=', $playersnumber)
            ->where('playersnumbermax', '>=', $playersnumber)
            ->get();

        return view('game.searchnumber', ['gameData' => $gameData]);
    }

    public function searchage(Request $request)
    {
        $playersage = $request->query('playersage');

        $game = new Game();
        $gameData = $game
            ->join('maker', 'maker.mid', '=', 'game.mid')
            ->where('recommendedage', '<=', $playersage)
            ->get();

        return view('game.searchage', ['gameData' => $gameData]);
    }
}
