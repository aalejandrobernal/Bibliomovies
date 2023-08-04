<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return $movies;
        // return Inertia::render('Movies');
    }
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function mostrar()
    {
        $movies = Movie::where('estado', 1)->paginate(60);
        // Log::info($movies);
        // $this->modificar($movies);
        
        
        return  response()->json($movies);
        //  return Inertia::render('Movie', ['movie' => $movies]);
    }
    public function modificar ($movies)
    {
        
        foreach ($movies as $movie) {
            
            $x=$movie->topografico.'.jpg';
           if(file_exists('storage/images/img/'.$x)){
               $y=Movie::where('id',$movie->id)->first();
               Log::info($x." dentro del foreach " .$y);
              $y->update(['img'=>$x]);
              }
           
       }
           
    }

}
