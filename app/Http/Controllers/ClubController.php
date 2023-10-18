<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Traits\ApiCrudTrait;

class ClubController extends Controller
{
    //
    use ApiCrudTrait;

    public function model()
    {
        return Club::class;
    }

    /** Return with relations */
    public function with()
    {
        $with = 'home_team';
        return $with;
    }





    public function validationRules($resource_id=0)
    {
        return ['name'=>'required','email' => 'required',
        'nationality'=>'required','phone'=>'required',
        'dob'=>'required'
    ];
}

}
