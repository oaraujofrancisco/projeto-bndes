<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    protected $fillable = [
       'id', 'lng', 'lat', 'rua', 'numero', 'complemento', 'bairro', 'cidade', 'estado','cep','drenagem_urbana','agua_potavel','coleta_tratamento_esgoto','coleta_residuos_solidos','comment','author_id'
    ];

    public function author()
    {
        return $this->belongsTo('App\User', 'from_user');
    }
}
