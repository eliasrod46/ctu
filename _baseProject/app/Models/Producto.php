<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    use HasFactory;

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function venta() : BelongsTo
    {
        return $this->belongsTo(producto::class);
    }
}
