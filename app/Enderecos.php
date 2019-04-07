<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model
{
    protected $fillable = [
        'id_cliente', 'cep', 'logradouro', 'numero', 'complemento', 'uf'
    ];

    protected $hidden = [];
}
