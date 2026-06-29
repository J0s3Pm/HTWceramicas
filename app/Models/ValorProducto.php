<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ValorProducto extends Model
{
    protected $table = 'valor_productos';
    protected $fillable = [
        'valor',
        'atributo_id',
        'producto_id'
    ];
    public function atributo(){
        return $this->belongsTo(Atributo::class);
    }
    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
