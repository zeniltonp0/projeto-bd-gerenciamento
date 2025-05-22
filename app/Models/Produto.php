<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
use SebastianBergmann\CodeUnit\FunctionUnit;

class Produto extends Model
{

    protected $connection = 'mongodb';
    protected $table = 'produtos';
    protected $fillable = [
        'nome',
        'descricao',
        'preco'
    ];
    public function pedidos(){
        return $this->belongsToMany(Pedido::class);
    }

    public function materiasPrimas(){
        return $this->hasMany(MateriaPrima::class);
    }
}
