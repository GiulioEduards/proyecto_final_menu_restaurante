<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;
    protected $table = 'ordenes';
    protected $fillable = [
        'name_customer',
        'delivery_type_id',
        'total',
        'status',
        'delivery_address',
        'contact_phone',
        'notes',
    ];

    public function category()
    {
        return $this->belongsTo(Tipo_delivery::class);
    }
}
