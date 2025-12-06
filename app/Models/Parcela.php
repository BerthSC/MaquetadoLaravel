<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    protected $table = 'parcelas';
    protected $primaryKey = 'idParcela';
    public $timestamps = false;

    protected $fillable = [
        'noParcela',
        'superficie',
        'ubicacion',
        'idEjidatario',
        'idUso'
    ];
}
