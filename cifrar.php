<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Cambia este correo y contraseña al que quieres cifrar
$correo = 'bertha.solis@ultimatetics.com.mx';
$contrasena = 'S3ptimob$tec';

// Actualizar en la base de datos
DB::table('usuarios')
    ->where('correo_electronico', $correo)
    ->update([
        'contrasennia' => Hash::make($contrasena)
    ]);

echo "Contraseña de $correo cifrada correctamente.\n";
