<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParcelasController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\GastosController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\RecursosController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResetPasswordController;






Route::get('/principal', function () {
    return view('AuthViews.principal'); // Ajusta según tu vista real
})->name('principal');

Route::get('/nuevoE', function(){
    return view('RegisterViews/nuevoEjidatario');
});

Route::get('/nuevaEntrada', function(){
    return view('RegisterViews/nuevaEntrada');
});

Route::get('/nuevoArt', function(){
    return view('RegisterViews/nuevoArticulo');
});

Route::get('/nuevoRecurso', function(){
    return view('RegisterViews/nuevoRecurso');
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

// Listado principal
Route::get('/listaEquipos', [\App\Http\Controllers\EquipoController::class, 'index'])
    ->name('equipos.principal');



Route::get('/nuevaP', [ParcelasController::class, 'create'])->name('parcelas.create');
Route::post('/nuevaP', [ParcelasController::class, 'store'])->name('parcelas.store');


// Formulario de creación
Route::get('/nuevoGasto', [GastosController::class, 'create'])->name('gastos.create');

// Guardar gasto
Route::post('/gastosguardar', [GastosController::class, 'store'])->name('gastos.store');



/// Gastos
Route::get('/gastos', [GastosController::class, 'index'])->name('gastos.index');          // Listar todos
Route::get('/gastos/nuevo', [GastosController::class, 'create'])->name('gastos.nuevo');   // Formulario nuevo
Route::post('/gastos/guardar', [GastosController::class, 'store'])->name('gastos.store'); // Guardar nuevo
Route::get('/gastos/editar/{id}', [GastosController::class, 'edit'])->name('gastos.editar'); // Editar
Route::put('/gastos/actualizar/{id}', [GastosController::class, 'update'])->name('gastos.actualizar'); // Actualizar
Route::delete('/gastos/eliminar/{id}', [GastosController::class, 'destroy'])->name('gastos.eliminar'); // Eliminar


Route::get('/consultaGast', function () {
    $gastos = DB::table('gastos')->orderBy('idGasto', 'desc')->get();
    return view('ListViews.consultaGasto', compact('gastos'));
});

/* Equipos */
Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.principal');
Route::get('/equipos/nuevo', [EquipoController::class, 'create'])->name('equipos.create');
Route::post('/equipos/guardar', [EquipoController::class, 'store'])->name('equipos.store');

Route::get('/equipos/{id}/editar', [EquipoController::class, 'editar'])
     ->name('equipos.editar');

Route::put('/equipos/{id}/actualizar', [EquipoController::class, 'actualizar'])
     ->name('equipos.actualizar');


Route::delete('/equipos/{id}/eliminar', [EquipoController::class, 'eliminar'])
     ->name('equipos.eliminar');



Route::get('/recursos', [RecursosController::class, 'index'])->name('recursos.index');
Route::get('/nuevoRecurso', [RecursosController::class, 'create'])->name('recursos.create');
Route::post('/recursos/guardar', [RecursosController::class, 'store'])->name('recursos.store');
Route::get('/recursos/editar/{id}', [RecursosController::class, 'edit'])->name('recursos.edit');
Route::put('/recursos/actualizar/{id}', [RecursosController::class, 'update'])->name('recursos.update');
Route::delete('/recursos/eliminar/{id}', [RecursosController::class, 'destroy'])->name('recursos.destroy');



// LOGIN
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// RECUPERAR CONTRASEÑA
Route::get('/forgot', [AuthController::class, 'showForgotForm'])->name('forgot');
Route::post('/forgot', [AuthController::class, 'sendRecoveryLink'])->name('forgot.send');

// CAMBIAR CONTRASEÑA CON TOKEN
Route::get('/reset/{token}', [AuthController::class, 'showResetForm'])->name('reset.form');
Route::put('/reset', [AuthController::class, 'resetPassword'])->name('reset.password');





/*
Route::get('/pruebas', function(){

    try{

        $FilaParcela = DB::table('parcelas')->insert([
            'noParcela' => '4',
            'superficie' => '400',
            'ubicacion' => 'san MAtias',
            'idEjidatario' => 6,
            'idUso' => 3
        ]);


        $ejidatario = DB::table('parcelas')
                    ->max("idParcela");

        return $ejidatario;
    }
    catch(Exception $e)
    {
        return $e->getMessage();
    }
});
*/






