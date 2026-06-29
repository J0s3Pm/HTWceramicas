<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoDetalle extends Model
{
    protected $table = 'pedido_detalles';
    protected $fillable = [
        'cantidad',
        'precio_unitario',
        'pedido_id',
        'producto_id'
    ];
    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }
    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
