<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    protected $table = 'recursos';
    protected $primaryKey = 'id_recurso';
    public $timestamps = false;

    protected $fillable = [
        'tipo',
        'cantidad',
        'fecha_recibo',
        'num_beneficiarios',
        'nombre_representante'
    ];
}
