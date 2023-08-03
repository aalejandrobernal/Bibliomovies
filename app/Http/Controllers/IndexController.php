<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Movie;
use Illuminate\Http\Request;
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
        // valida los datos ingresados
        $request->validate([
            'titulo'=>'required',
            'audiencia'=>'required',
            'topografico'=>'required|unique:movies',
            'file' => "image|mimes:jpeg,jpg,png"
        ]);
        if($request->hasFile('file')){
            Log::info('si hay imagen');
            // $nombre_img=$request->input('documento');
            // $extension= $request->file('imagen')->getClientOriginalExtension();
            // $nombre_foto=$nombre_img.'.'.$extension;
            // $request->merge(['foto'=>$nombre_foto]);
            // $request->merge(['password'=>$nombre_img]);
            // $image = $request->file('imagen');
            // $img = Image::make($image->getRealPath())->encode('jpg', 65)
            // ->fit(591, 591,function ($c) {
            //     $c->aspectRatio();
            //     $c->upsize();
            // });
            // Storage::disk('local')->put('public/images/fotos' . '/' . $nombre_foto, $img, 'public');
        }
        // convierte el compo TOPOGRAFICO en mayusculas
        $request->merge(['topografico'=>mb_strtoupper($request->topografico)]);
        // $movie=Movie::create($request->all());
        Log::info($request->input('file'));
        // Log::info($movie);
        // return $users;
    }

}
