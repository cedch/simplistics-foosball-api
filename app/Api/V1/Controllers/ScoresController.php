<?php

namespace App\Api\V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Player;
use App\Score;
use App\Rating;

class ScoresController extends Controller
{
    public function getAllScores(Request $request)
    {
        $scores = Score::with('winner','loser')->orderBy('created_at','asc')->get()->toArray();

        return $scores;
    }

    public function getScores(Request $request)
    {
        $player = Player::find($request->get('player'));

        return $player->scores()->get()->toArray();
    }

    public function create(Request $request)
    {
        $score1 = $request->get('score1');
        $score2 = $request->get('score2');
        $player1 = $request->get('player1');
        $player2 = $request->get('player2');

        $player1_obj = Player::find($player1);
        $player2_obj = Player::find($player2);
        $newScore = new Score();
        if($score1 > $score2){
            $newScore->loser_id = $player2;
            $newScore->winner_id = $player1;
            $newScore->winner_score = $score1;
            $newScore->loser_score = $score2;
            $rating = new Rating($player1_obj->points, $player2_obj->points, Rating::WIN, Rating::LOST);
        }else{
            $newScore->loser_id = $player1;
            $newScore->winner_id = $player2;
            $newScore->winner_score = $score2;
            $newScore->loser_score = $score1;
            $rating = new Rating($player1_obj->points, $player2_obj->points, Rating::LOST, Rating::WIN);
        }

        $newScore->save();

        $results = $rating->getNewRatings();
        $player1_obj->points = $results["a"];
        $player2_obj->points = $results["b"];
        $player1_obj->save();
        $player2_obj->save();
        return $results;

        return response()->json([
            'status' => 'ok'
        ], 201);
    }

    public function edit(Request $request)
    {
        $score1 = $request->get('score1');
        $score2 = $request->get('score2');
        $player1 = $request->get('player1');
        $player2 = $request->get('player2');

        $newScore = Score::find($request->get('score_id'));
        if($score1 > $score2){
            $newScore->loser_id = $player2;
            $newScore->winner_id = $player1;
            $newScore->winner_score = $score1;
            $newScore->loser_score = $score2;
        }else{
            $newScore->loser_id = $player1;
            $newScore->winner_id = $player2;
            $newScore->winner_score = $score2;
            $newScore->loser_score = $score1;
        }

        $newScore->save();

        return response()->json([
            'status' => 'ok'
        ], 201);
    }

    public function delete(Request $request)
    {
        $newScore = Score::find($request->get('score_id'));
        $newScore->delete();
        return response()->json([
            'status' => 'ok'
        ], 201);
    }
}
