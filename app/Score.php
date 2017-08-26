<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public function winner()
    {
        return $this->belongsTo('App\Player', 'winner_id');
    }

    public function loser()
    {
        return $this->belongsTo('App\Player', 'loser_id');
    }
}
