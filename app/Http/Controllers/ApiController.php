<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getDataFromApi()
    {
        $options = [
            // method: 'GET',
            // url: 'https://moviesdatabase.p.rapidapi.com/titles/search/title/next',
            
            // params: {
            //   exact: 'false',
            //   titleType: 'movie'
            // },
            // headers: {
            //   'X-RapidAPI-Key': 'e992497d5cmsh530bed812e23ad2p190014jsncbf083eb1c3d',
            //   'X-RapidAPI-Host': 'moviesdatabase.p.rapidapi.com'
            // }
        ];
        $response = Http::get('https://moviesdatabase.p.rapidapi.com/');
        return response()->json($response->json());
    }
}
