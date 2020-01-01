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

    public function search(Request $request)
    {

        $playersnumber = $request->query('playersnumber');
        $playersage = $request->query('playersage');

        $game = new Game();
        $gameData = $game
            ->join('maker', 'maker.mid', '=', 'game.mid')
            ->when($playersnumber, function ($query, $playersnumber) {
                return $query->where('playersnumbermin', '<=', $playersnumber)
                    ->where('playersnumbermax', '>=', $playersnumber);
            })
            ->when($playersage, function ($query, $playersage) {
                return $query->where('recommendedage', '<=', $playersage);
            })
            ->get();

        return view('game.searchnumber', ['gameData' => $gameData]);
    }
}
