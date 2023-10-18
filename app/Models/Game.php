<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['home_team','away_team','start_date','end_date','overs',
    'overs_per_bowler','ground','win_team','home_captain','away_captain',
    'power_play','keeper','twelveth_man'];

    public function home_team()
    {
        return $this->belongsTo(Club::class,'home_team');
    }
    public function away_team()
    {
        return $this->belongsTo(Club::class,'away_team');
    }




}
