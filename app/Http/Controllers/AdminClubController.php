<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\ApiCrudTrait;

class AdminClubController extends Controller
{
    //
    use ApiCrudTrait;

    public function model()
    {
        return User::class;
    }

    /** Return with relations */
    public function with()
    {
        $with = '';
        return $with;
    }





    public function validationRules($resource_id=0)
    {
        return ['name'=>'required','email' => 'nullable',
        'nationality'=>'nullable','phone'=>'nullable',
        'dob'=>'nullable','home_ground'=>'nullable'
    ];

    }

}
