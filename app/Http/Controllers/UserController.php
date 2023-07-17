<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Movie;

class UserController extends Controller
{
    public function noticiaVue()
    {
        $User = User::all();
       return  response()->json($User);
    }
    public function movies()
    {
        $movies= Movie::all();
       return  response()->json($movies);
    }
}
