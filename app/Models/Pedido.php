<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $fillable = [
        'estado',
        'fecha',
        'cliente_id'
    ];
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function detalles(){
        return $this->hasMany(PedidoDetalle::class);
    }
}
