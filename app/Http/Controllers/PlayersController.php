<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\ApiCrudTrait;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use ApiCrudTrait;

    public function model()
    {
        return User::class;
    }



    public function validationRules($resource_id=0)
    {
        return ['name'=>'required','email' => 'required',
        'nationality'=>'required','phone'=>'required',
        'dob'=>'required','batting'=>'nullable','bowling'=>'nullable',
        'role'=>'nullable'
    ];

    }
}
