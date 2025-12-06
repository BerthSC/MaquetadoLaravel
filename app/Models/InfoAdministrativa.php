<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoAdministrativa extends Model
{
    protected $table = 'infoadministrativa';
    protected $primaryKey = 'idInfoAdministrativa';
    public $timestamps = false;

    protected $fillable = [
        'num_inscripcionRAN',
        'claveNucleoAgrario',
        'comunidad',
        'fechaExpedicion',
        'idParcela'
    ];

    public function parcela()
    {
        return $this->belongsTo(Parcela::class, 'idParcela', 'idParcela');
    }
}
