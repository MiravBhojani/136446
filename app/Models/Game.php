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
}
