<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
use SebastianBergmann\CodeUnit\FunctionUnit;

class Produto extends Model
{
    public function pedidos(){
        return $this->belongsToMany(Pedido::class);
    }

    public function materiasPrimas(){
        return $this->hasMany(MateriaPrima::class);
    }
}
