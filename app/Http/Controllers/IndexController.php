<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Movie;


class IndexController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function noticiaVue()
    {
        $movies= Movie::all();
       return  response()->json($movies);
    }
    public function movies()
    {
        $movies= Movie::all();
       return  response()->json($movies);
    }

}
