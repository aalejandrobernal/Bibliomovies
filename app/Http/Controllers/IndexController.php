<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


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

    public function mod(Request $request )
    {
        $user           = Auth::user();
        // Log::info($user);
        // valida los datos ingresados
        $request->validate([
            'titulo'=>'required',
            'audiencia'=>'required',
            'topografico'=>'required|unique:movies',
            'file' => "image|mimes:jpeg,jpg,png"
        ]);
        // convierte el atributo TOPOGRAFICO en mayusculas
        $request->merge(['topografico'=>mb_strtoupper($request->topografico)]);
        // predefine el estado ce cada materian en estado activo
        $request->merge(['estado'=>1]);
        // registra el usuario que esta registrando la materia
        $request->merge(['user'=>$user->email] );
        // guarda y cambiar el nombre de la imagen
        if($request->hasFile('file')){
            $nombre_img=$request->input('topografico');
            $extension= $request->file('file')->getClientOriginalExtension();
            $nombre_foto=$nombre_img.'.'.$extension;
            $request->merge(['img'=>$nombre_foto]);
             $image = $request->file('file');
             $img = Image::make($image->getRealPath())->encode('jpg', 65)
             ->fit(591, 591,function ($c) {
                $c->aspectRatio();
                $c->upsize();
            });
            Log::info($request->all());
            // Storage::disk('local')->put('public/images/fotos' . '/' . $nombre_foto, $img, 'public');
        }
        
        
         $movie=Movie::create($request->all());
       
        // Log::info($movie);
        // return $users;
    }
    public function modmov( Request $request , Movie $movie)
    {
        // $user           = Auth::user();
        Log::info($request->all());
        // // valida los datos ingresados
        // $request->validate([
        //     'titulo'=>'required',
        //     'audiencia'=>'required',
        //     'topografico'=>'required|unique:movies',
        //     'file' => "image|mimes:jpeg,jpg,png"
        // ]);
        // // convierte el atributo TOPOGRAFICO en mayusculas
        // $request->merge(['topografico'=>mb_strtoupper($request->topografico)]);
        // // predefine el estado ce cada materian en estado activo
        // $request->merge(['estado'=>1]);
        // // registra el usuario que esta registrando la materia
        // $request->merge(['user'=>$user->email] );
        // // guarda y cambiar el nombre de la imagen
        // if($request->hasFile('file')){
        //     $nombre_img=$request->input('topografico');
        //     $extension= $request->file('file')->getClientOriginalExtension();
        //     $nombre_foto=$nombre_img.'.'.$extension;
        //     $request->merge(['img'=>$nombre_foto]);
        //      $image = $request->file('file');
        //      $img = Image::make($image->getRealPath())->encode('jpg', 65)
        //      ->fit(591, 591,function ($c) {
        //         $c->aspectRatio();
        //         $c->upsize();
        //     });
        //     Log::info($request->all());
            // Storage::disk('local')->put('public/images/fotos' . '/' . $nombre_foto, $img, 'public');
        // }
        
        
        //  $movie=Movie::create($request->all());
       
        // Log::info($movie);
        // return $users;
    }

}
