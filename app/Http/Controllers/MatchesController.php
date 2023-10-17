<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Traits\ApiCrudTrait;

class MatchesController extends Controller
{
    //
    use ApiCrudTrait;

    public function model()
    {
        return Game::class;
    }



    public function validationRules($resource_id=0)
    {
        return ['home_team'=>'required','away_team' => 'required',
        'start_date'=>'required','end_date'=>'required',
        'home_captain'=>'required','away_captain'=>'required','keeper'=>'required',
        'ground'=>'required'
    ];
}
}
