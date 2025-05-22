<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;


class Pedido extends Model
{
    public function produtos(){
        return $this->belongsToMany(Produto::class);
    }

    public function venda() {
        return $this->hasOne(Venda::class);
    }
}
