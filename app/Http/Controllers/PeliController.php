<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Inertia\Inertia;

class PeliController extends Controller
{
    public function mostrar()
    {
        $movies = Movie::all();
        return Inertia::render('Movie', ['movie' => $movies]);
    }

}
