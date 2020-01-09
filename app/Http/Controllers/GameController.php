<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Play;
use DB;

class GameController extends Controller
{
    public function index()
    {
        $game = new Game();
        $gameData = $game
            ->join('maker', 'maker.mid', '=', 'game.mid')
            ->get();

        $play = new Play();
        $playData = $play
            ->select(DB::raw('YEAR(hi) AS hi'))
            ->distinct()
            ->get();

        return view('game.index', ['gameData' => $gameData,'playData' => $playData]);
    }

    public function search(Request $request)
    {

        $playersnumber = $request->query('playersnumber');
        $playersage = $request->query('playersage');

        $game = new Game();
        $gameData = $game
            ->join('maker', 'maker.mid', '=', 'game.mid')
            ->join('play', 'play.gid', '=', 'game.gid')
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

    public function play()
    {
        $game = new Game();
        $gameData = $game
            ->join('maker', 'maker.mid', '=', 'game.mid')
            ->join('play', 'play.gid', '=', 'game.gid')
            ->orderBy('play.hi', 'desc')
            ->get();

        $gameDataAll = $game->all();

        return view('game.play', ['gameData' => $gameData,'gameDataAll' => $gameDataAll]);
    }

    public function playaddkakunin(\App\Http\Requests\PlayAddRequest $request)
    {
        $gid = $request->input('gid');
        $hi = $request->input('hi');
        $evaluation = $request->input('evaluation');

        $game = new Game();
        $gameData = $game
            ->find($gid);

        return view('game.playaddkakunin',['gid' => $gid,'hi' => $hi,'evaluation' => $evaluation,'gameData' => $gameData]);
    }

    public function playaddkanryou(Request $request)
    {
        $gid = $request->input('gid');
        $hi = $request->input('hi');
        $evaluation = $request->input('evaluation');

        $play = new Play();
        $play->create(['gid' => $gid,'hi' => $hi,'evaluation' => $evaluation]);

        return view('game.kanryou',['shori' => 'プレイ記録追加']);
    }

    public function playcount(Request $request)
    {
        $hi = $request->query('hi');

        $game = new Game();
        $gameData = $game
            ->join('maker', 'maker.mid', '=', 'game.mid')
            ->join('play', 'play.gid', '=', 'game.gid')
            ->select(DB::raw('count("*") AS playcount,avg(evaluation) AS evaluationAvg,play.gid,mname,gname,hi,YEAR(hi)'))
            ->whereRaw('YEAR(hi)=:hi',['hi' => $hi])
            ->groupBy('play.gid','mname','gname','hi','YEAR(hi)')
            ->get();

        //SELECT count("*") AS playcount,avg(evaluation) AS evaluationAvg,play.gid,mname,gname,YEAR(hi) FROM game INNER JOIN maker ON maker.mid=game.mid INNER JOIN play ON play.gid=game.gid WHERE YEAR(hi)="2019" GROUP BY play.gid,mname,gname,YEAR(hi);

        return view('game.playcount', ['gameData' => $gameData]);
    }
}
