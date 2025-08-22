<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_Orden extends Model
{
    use HasFactory;
    protected $table = 'items_ordenes';
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'unit_price',
        'subtotal'
    ];
    public function category()
    {
        return $this->belongsTo(Orden::class);
        return $this->belongsTo(Producto::class);
    }
}
