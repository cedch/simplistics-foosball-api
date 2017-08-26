<?php

namespace App\Api\V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Player;

class PlayersController extends Controller
{
    public function getPlayers()
    {
       return Player::where('points','>',0)->orderBy('points','desc')->get()->toArray();
    }
}
