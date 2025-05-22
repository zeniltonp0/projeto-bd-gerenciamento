<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Venda extends Model
{

    protected $connection = 'mongodb';
    protected $table = 'vendas';
    protected $fillable = [
        'data',
        'cliente',
        'produto',
        'quantidade',
        'forma-pagamento'
    ];

    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }
}
