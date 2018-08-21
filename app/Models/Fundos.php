<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fundos extends Model
{
    protected $fillable = [
        'codigo',
        'cnpj',
        'fantasia',
        'razao_social',
        'natureza',
        'cep',
        'logradouro',
        'numero',
        'compl',
        'bairro',
        'cidade',
        'estado',
        'ibge',
        'tipo',
        'ie', 
        'user_cad',
        'im', 
        'ativo'
    ];
}
