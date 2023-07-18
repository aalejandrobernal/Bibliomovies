<?php
use App\Http\Controllers\PeliController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('hi', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

        Route::get('/dashboard', function () {
                return Inertia::render('Dashboard');
            })->name('dashboard');
});


Route::get('noticiaVue', [UserController::class, 'noticiaVue'])// ---------> VISTA Vue
    //  ->middleware('auth')
    // ->name('noticiaVue')
    ;
Route::get('movies-uno', [UserController::class, 'movies'])// ---------> VISTA Vue
    //  ->middleware('auth')
    ->name('noticiaVue')
    ;
// Route::resource('/', MovieController::class)
//     //  ->middleware('auth')
//     ->names('movies')
//     ;
Route::get('/',  function (){
    return Inertia::render('Movies',[
        'canLogin' => Route::has('login'),
    ]);
    
    })
    //  ->middleware('auth')
    ->name('/')
    ;
Route::get('/movie', [PeliController::class, 'mostrar'], function () {
    return Inertia::render('Movie');
    })
    // ->middleware('auth')
    ->name('movie')
    ;