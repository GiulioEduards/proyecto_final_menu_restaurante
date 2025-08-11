<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_delivery extends Model
{
    use HasFactory;
    protected $table = 'tipo_delivery';
    protected $fillable = [
        'name',
        'price',
        'is_active'
    ];
}
