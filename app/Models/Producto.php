<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $fillable = [
        'nombre',
        'modelo',
        'precio_referencial',
        'categoria_id'
    ];
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    public function multimedia(){
        return $this->hasMany(Multimedia::class);
    }
    public function atributos(){
        return $this->hasMany(ValorProducto::class);
    }
    public function detalles(){
        return $this->hasMany(PedidoDetalle::class);
    }
}
