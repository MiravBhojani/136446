<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Traits\ApiCrudTrait;

class PostController extends Controller
{
    //
    use ApiCrudTrait;

    public function model()
    {
        return Post::class;
    }

    public function validationRules($resource_id = 0)
    {
        return ['title'=>'required','content' => 'required'];
    }
}
