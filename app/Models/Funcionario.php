<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;


class Funcionario extends Model
{
    protected $connection = 'mongodb';
    protected $table = 'funcionarios';
    protected $fillable = [
        'nome',
        'diaria',
        'dias_trabalhados',
        'salario'
    ];
}
