<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    protected $table = 'multimedia';
    protected $fillable = [
        'imagen_principal',
        'render_ambiente',
        'macro_textura',
        'producto_id'
    ];
    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
