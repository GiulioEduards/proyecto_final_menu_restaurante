<?php

namespace App\Models;

use Illuminate\Container\Attributes\Database;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    use HasFactory;
    protected $table = 'categorias';
    protected $fillable = [
        'name',
        'description',
        'image',
        'is_active'
    ];
}
