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
        $movies = Movie::where('ESTADO', 1)->get();
        foreach ($movies as $movie) {
            $x=$movie->TOPOGRAFICO.'.jpg';
            if(file_exists('storage/images/img/'.$x)){
                $y=Movie::where('ID',$movie->ID)->first();
                $y->IMG=$x; 
                
                 
                 $y->update(['IMG'=>$x]);
                 Log::info($y);
               }
            
        }
        
        return  response()->json($movies);
        // return Inertia::render('Movie', ['movie' => $movies]);
    }
    public function modificar ($movie, Movie $movies )   
    {
       
        //
           
    }

}
