<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livros extends Model
{
    protected $fillable = [
        'titulo',
        'descricao',
        'autor',
        'numero_paginas',
        'data_cadastro',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}