<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PeliController;
use App\Http\Controllers\IndexController;

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

Route::get('/modmovies', function () {
        return Inertia::render('Modmovies');
    })->name('modmovies');

Route::post('/modificarmovie', [IndexController::class, 'mod'])
    ->name('mod');


Route::put('/modifiMov', [IndexController::class, 'modmov'])
    ->name('modmov');

// Route::resource('admin/users',MovieController::class)
//     ->only('index','edit','create','store','update','show')
    
//     ->names('admin.users');
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
Route::get('/movie', function () {
    return Inertia::render('Movie');
    })
    // ->middleware('auth')
    ->name('movie')
    ;

Route::get('/movie1', function () {
        return Inertia::render('Mov');
        })
        // ->middleware('auth')
        ->name('movie1')
        ;


Route::get('/mov',[MovieController::class, 'mostrar'])
    // ->middleware('auth')
    ->name('mov')
    ;

