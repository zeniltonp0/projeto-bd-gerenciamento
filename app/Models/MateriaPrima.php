<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;


class MateriaPrima extends Model
{

    protected $connection = 'mongodb';
    protected $table = 'materia_primas';
    protected $fillable = [
        'nome',
        'quantidade',
        'valor',
        'data',
        'valor_total'
    ];
    public function produtos(){
        return $this->belongsToMany(Produto::class);
    }
}
