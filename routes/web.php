<?php

use Illuminate\Support\Facades\Route;

Route::get('/principal', function(){
    return view('AuthViews/principal');
});

Route::get('/nuevoE', function(){
    return view('RegisterViews/nuevoEjidatario');
});

Route::get('/nuevaP', function(){
    return view('RegisterViews/nuevaParcela');
});

Route::get('/nuevoArt', function(){
    return view('RegisterViews/nuevoArticulo');
});

Route::get('/nuevoGast', function(){
    return view('RegisterViews/nuevoGasto');
});

Route::get('/listadoParc', function(){
    return view('ListViews/listadoParcelas');
});

Route::get('/listadoEjidatarios', function(){
    return view('ListViews/listadoEjidatarios');
});

Route::get('/consultaGast', function(){
    return view('ListViews/consultaGasto');
});